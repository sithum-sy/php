<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Publication;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailySummary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-daily-summary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a daily summary email with the count of new publications, likes,
                                and comments to admin users';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
        // $yesterday = Carbon::yesterday();

        // Count the new publication, likes, and comments from yesterday
        $newPublicationCount = Publication::whereDate('created_at', $today)->count();
        $newLikeCount = Like::whereDate('created_at', $today)->count();
        $newCommentCount = Comment::whereDate('created_at', $today)->count();

        //Get all admin users
        $adminUsers = User::where('role', 'admin')->get();

        //Send email to each admin user
        foreach ($adminUsers as $admin) {
            Mail::raw(
                "Summary for {$today->toFormattedDateString()}:\n\n" .
                    "New Publications: {$newPublicationCount}\n" .
                    "New Likes: {$newLikeCount}\n" .
                    "New Comments: {$newCommentCount}\n",
                function ($message) use ($admin) {
                    $message->to($admin->email)->subject('Daily Summary');
                }
            );
        }

        $this->info('Daily summary email sent to admin users.');
    }
}
