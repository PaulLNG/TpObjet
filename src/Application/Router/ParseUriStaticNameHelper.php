<?php

declare(strict_types=1);

namespace Application\Router;

use Application\Controller\IndexController;
use Application\Controller\LecturerController;

use Application\Controller\CommunityController;
use Application\Controller\ShowCommunityController;

use Application\Controller\MeetingController;
use Application\Controller\ShowMeetingController;
use Application\Controller\ShowMeetingsByCommunityController;
use Application\Controller\ShowMeetingDetailsController;

use Application\Controller\UserController;
use Application\Controller\ShowUserController;
use Exception;

use function explode;
use function preg_match;
use function substr;
use function urldecode;

/**
 * Class ParseUriStaticNameHelper
 * @package Application\Router
 */
final class ParseUriStaticNameHelper implements ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function parseUri(string $requestUri): string
    {
        if ($requestUri === '/') {
            $requestUri = substr($requestUri, 1);
        }
        
        
        if ($requestUri === '/Meeting') {
            
            
            return MeetingController::class;
        }
        
        if ($requestUri === '/Meeting_a_venir') {
            
            return ShowMeetingController::class;
        }
        
       
        if (preg_match('#/Details_meeting/.*#', $requestUri)) {
            
            $requestUriParams = explode('/', $requestUri);
            
            $_GET['meetingId'] = urldecode($requestUriParams[2]);
            
            return ShowMeetingDetailsController::class;
        }
        
        if (preg_match('#/Meeting_user/.*#', $requestUri)) {
            
            $requestUriParams = explode('/', $requestUri);
            
            $_GET['name'] = urldecode($requestUriParams[2]);
            
            return UserController::class;
        }
        
        if (preg_match('#/MeetingByCommunity/.*#', $requestUri)) {
            
            $requestUriParams = explode('/', $requestUri);
            
            $_GET['communityId'] = urldecode($requestUriParams[2]);
            
            return ShowMeetingsByCommunityController::class;
        }
        
        
        if ($requestUri === '/Orga_meeting') {
            
            return ShowUserController::class;
        }
        
        
        if ($requestUri === '/Communities') {
            
            return CommunityController::class;
        }
        
        
        if (preg_match('#/Community/.*#', $requestUri)) {
            
            $requestUriParams = explode('/', $requestUri);
            
            $_GET['name'] = urldecode($requestUriParams[2]);
            
            return ShowCommunityController::class;
        }
       
        return IndexController::class;
    }
}
