<?php

namespace App\Services;

use App\Models\Account;
use App\Models\AccountTransaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Description of AccountServiceExtend
 *
 * @author root87x
 */
class AccountServiceExtend extends AccountService
{
    private $account;
    private $referree_id;

    public function __construct(Account $account, int $referree_id)
    {
        $this->account = $account;
        $this->referree_id = $referree_id;
    }

    /**
     * Create account transaction
     *
     * @param Model $transactionable
     * @param float $amount
     */
    public function transaction(Model $transactionable, float $amount)
    {
        if ($amount != 0 && abs($amount) >= 0.01) {
            DB::transaction(function () use ($transactionable, $amount) {
                // update account balance
                if ($amount > 0)
                    $this->account->increment('balance', $amount);
                else
                    $this->account->decrement('balance', abs($amount));

                // create account transaction
                $transaction = new AccountTransaction();
                $transaction->account()->associate($this->account);
                $transaction->referree_id = $this->referree_id;
                $transaction->amount = $amount;
                $transaction->balance = $this->account->balance;
                $transactionable->transaction()->save($transaction);
            });
        }
    }

    /**
     * Create a new user account
     *
     * @param User $user
     * @return Account
     */
    public static function create(User $user)
    {
        $account = new Account();
        $account->user()->associate($user);
        $account->code = bin2hex(random_bytes(25));
        $account->save();

        return $account;
    }
}
