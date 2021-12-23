<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\PackageManager;
use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use DB;
use Packages\Raffle\Models\Raffle;

class PageController extends Controller
{
    public function index()
    {
        $games = Game::where('status', Game::STATUS_COMPLETED)
            ->with('account.user', 'gameable')
            ->orderBy('win', 'desc')
            ->limit(5)
            ->get();
        $raffle = Raffle::orderBy('id', 'desc')->first();
        $biggestWin = Game::where('status', Game::STATUS_COMPLETED)
            ->with('account.user', 'gameable')
            ->orderBy('win', 'desc')
            ->with('account.user')->first();

        // get top game and cache it for 5 minutes
        $topGame = Cache::remember('top_game', 5, function() {
            return Game::where('status', Game::STATUS_COMPLETED)->orderBy('win', 'desc')->with('account.user')->first();
        });
//        dump($topGame);
//        dd($biggestWin);
        $users = User::selectRaw('users.id, users.name, COUNT(games.id) AS total_games, IFNULL(SUM(games.bet),0) AS total_bet, IFNULL(MAX(games.win),0) AS max_win, IFNULL(SUM(games.win),0) AS total_win, IFNULL(SUM(games.win-games.bet),0) AS total_net_win')
            ->leftJoin('accounts', 'accounts.user_id', '=', 'users.id')
            ->leftJoin('games', 'games.account_id', '=', 'accounts.id')
            ->where('users.status', User::STATUS_ACTIVE)
            ->where('games.status', Game::STATUS_COMPLETED)
            ->groupBy('users.id','name')
            ->orderBy('total_win', 'desc')
            ->paginate($this->rowsPerPage);

        $jackpot = DB::table('other_settings')->where("settings_name","=","jackpot")->first();

        // try to load user defined view first
        return view("frontend.pages.home",[
            'games'       => $games,
            'jackpot'  => $jackpot,
            'biggestWin'  => $biggestWin,
            'top_game'    => $topGame,
            'users'       => $users,
            'raffle'        => $raffle,
            'tickets'       => $raffle->tickets ?? NULL,
            'participants'  => $raffle ? $raffle->accounts()->with('user')->get()->groupBy('user_id')->map(function ($accounts) {
                return (object) [
                    'user'           => $accounts[0]->user,
                    'tickets_count'  => count($accounts),
                    'last_purchased' => Carbon::parse(max(array_column(array_column($accounts->toArray(), 'pivot'), 'created_at')))
                ];
            })->sortByDesc('tickets_count') : collect(),
        ]);
    }

    /**
     * Display a static page
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function display($slug)
    {
        $view = 'frontend.pages.static.' . $slug;

        return view()->exists($view . '-udf') // try to load user defined view first
            ? view($view . '-udf')
            : (view()->exists($view) // load system static page
                ? view($view)
                : abort(404));
    }

    /**
     * Recent games page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recentGames()
    {
        $games = Game::where('updated_at', '>', Carbon::now()->subDays(3))
            ->where('status', Game::STATUS_COMPLETED)
            ->orderBy('updated_at', 'desc')
            ->with('account.user', 'gameable')
            ->paginate($this->rowsPerPage);

        return view('frontend.pages.history.recent', [
            'games' => $games
        ]);
    }

    public function topWins()
    {
        $games = Cache::remember('top_wins', 60, function() {
            return Game::where('win', '>', 0)
                ->where('status', Game::STATUS_COMPLETED)
                ->orderBy('win', 'desc')
                ->limit(10)
                ->with('account.user', 'gameable')
                ->get();
        });

        return view('frontend.pages.history.top-wins', [
            'games' => $games
        ]);
    }

    public function topLosses()
    {
        $games = Cache::remember('top_losses', 60, function() {
            return Game::where('win', '=', 0)
                ->where('status', Game::STATUS_COMPLETED)
                ->orderBy('bet', 'desc')
                ->limit(10)
                ->with('account.user', 'gameable')
                ->get();
        });

        return view('frontend.pages.history.top-losses', [
            'games' => $games
        ]);
    }

    /**
     * My games page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myGames(Request $request)
    {
        $account = auth()->user()->account;

        $games = Game::where('account_id', $account->id)
            ->where('status', Game::STATUS_COMPLETED)
            ->orderBy('updated_at', 'desc')
            ->with('gameable')
            ->paginate($this->rowsPerPage);

        return view('frontend.pages.history.my', [
            'games' => $games
        ]);
    }

    /**
     * Provably fair verification page
     *
     * @param Game $game
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function verify(Game $game, Request $request, PackageManager $packageManager)
    {
        $packageId = Utils::classId($game->gameable);
        $package = $packageManager->get($packageId);

        if (!$package || $packageManager->disabled($packageId))
            return back()->withErrors(__('Game info is currently not available.'));

        if ($game->status != Game::STATUS_COMPLETED || $request->user()->id != $game->account->user->id)
            abort(404);

        return view('frontend.pages.history.verify', [
            'game'              => $game,
            'game_package_id'   => Utils::classId($game->gameable) // GameSlots => game-slots
        ]);
    }

    /**
     * Leaderboard page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function raffle(Request $request)
    {
        return view('frontend.pages.raffle.index');
    }

    public function leaderboard(Request $request)
    {
        $game = $search = $request->query('game');
        $period = $search = $request->query('period');

        $users = User::selectRaw('users.id, users.name, COUNT(games.id) AS total_games, IFNULL(SUM(games.bet),0) AS total_bet, IFNULL(MAX(games.win),0) AS max_win, IFNULL(SUM(games.win),0) AS total_win, IFNULL(SUM(games.win-games.bet),0) AS total_net_win')
            ->leftJoin('accounts', 'accounts.user_id', '=', 'users.id')
            ->leftJoin('games', 'games.account_id', '=', 'accounts.id')
            ->where('users.status', User::STATUS_ACTIVE)
            ->where('games.status', Game::STATUS_COMPLETED)
            ->when($game, function($query, $game) use($request) {
                $provider = 'Packages\Game' . $game . '\Providers\PackageServiceProvider';
                $model = 'Packages\Game' . $game . '\Models\Game' . $game;
                // if game service provider is loaded
                if (array_key_exists($provider, app()->getLoadedProviders())) {
                    $query->where('games.gameable_type', $model);
                    // for multi slots games add extra clause on the game index column
                    if ($model == 'Packages\GameMultiSlots\Models\GameMultiSlots') {
                        $index = intval($request->query('index'));
                        $query->join('game_multi_slots', 'games.gameable_id', '=', 'game_multi_slots.id');
                        $query->where('game_multi_slots.game_index', $index);
                    // for lukcy wheel games add extra clause on the game index column
                    } elseif ($model == 'Packages\GameLuckyWheel\Models\GameLuckyWheel') {
                        $index = intval($request->query('index'));
                        $query->join('game_lucky_wheel', 'games.gameable_id', '=', 'game_lucky_wheel.id');
                        $query->where('game_lucky_wheel.game_index', $index);
                    }
                }
            })
            ->when($period, function($query, $period) {
                if ($period == 'CurrentWeek') {
                    $query->where('games.updated_at', '>=', (new Carbon())->startOfWeek());
                } elseif ($period == 'CurrentMonth') {
                    $query->where('games.updated_at', '>=', (new Carbon())->startOfMonth());
                } elseif ($period == 'PreviousMonth') {
                    $query
                        ->where('games.updated_at', '>=', (new Carbon())->startOfMonth()->subMonth())
                        ->where('games.updated_at', '<', (new Carbon())->startOfMonth());
                } elseif ($period == 'CurrentYear') {
                    $query->where('games.updated_at', '>=', (new Carbon())->startOfYear());
                }
            })
            ->groupBy('users.id','name')
            ->orderBy('total_win', 'desc')
            ->paginate($this->rowsPerPage);

        return view('frontend.pages.leaderboard', [
            'users' => $users
        ]);
    }

    /**
     * @param Request $request
     */
    public function jackpot(Request $request){

        $jackpot = intval($request->jackpot);

        if($jackpot >= 0 ){
            $add = rand(1,6)/100000;
            $result = DB::table('other_settings')->where("settings_name","=","jackpot")->first();
            if($result->value > 20){
                $final = 0;
            }else{
                $final = $result->value + $add;

            }

            DB::table('other_settings')
            ->where("settings_name","=","jackpot")
                ->update([
                    "value" => round($final, 6),
            ]);

            return $final;
        }
    }

    public function provably_fair(){
        return view('frontend.pages.provably_fair');
    }
    public function policy(){
        return view('frontend.pages.policy');
    }
    public function terms_use(){
        return view('frontend.pages.terms_use');
    }

    public function affiliate(){
        return view('frontend.pages.static.affiliate');
    }
}
