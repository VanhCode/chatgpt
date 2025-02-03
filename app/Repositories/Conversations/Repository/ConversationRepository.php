<?php

namespace App\Repositories\Conversations\Repository;

use App\Models\Conversation;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Conversations\Interface\ConversationInterface;

class ConversationRepository extends BaseRepository implements ConversationInterface
{
    public function getModel()
    {
        return Conversation::class;
    }
}
