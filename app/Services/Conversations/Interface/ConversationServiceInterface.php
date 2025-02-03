<?php

namespace App\Services\Conversations\Interface;

use App\Services\Base\BaseServiceInterface;

interface ConversationServiceInterface extends BaseServiceInterface
{
    public function generateResponse($message);
}
