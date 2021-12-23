<style>
  .owl-theme .item .biggestwins__upper .clippath{
    padding-left: 25px;
    font-size: 14px;
  }
  .owl-theme .item .biggestwins__upper .clippath{
width: 150px;
    height: 50px;
  }
</style>
@if(!$games->isEmpty())
  <div class="biggestwins">
    <div class="biggestwins__upper">
      <span>{{__("Biggest win")}}</span>
      <div class="clippath">{{$biggestWin->gameable->result}}</div>
    </div>
    <div class="biggestwins__content">
      <span class="win">{{__("Win now")}}</span>

      <div class="winn">
        @foreach ($games as $game)

          <div class="wins">
            <img src="assets/img/slot.png" alt="">
            <img class="winner" loading="lazy" src="assets/img/winner.png" alt="">
            <div>
              <span class="gamename">{{$game->title}}</span>
              <span class="username">{{substr($game->account->user->name , 0, 2)}}***{{substr($game->account->user->name , -1)}}</span>
              <span class="win">{{__("Win")}} {{ $game->gameable->result }}</span>
            </div>
          </div>

        @endforeach
      </div>

    </div>
  </div>
@endif