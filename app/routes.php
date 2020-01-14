<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Template\Engine;
use App\Application\Template\EngineInterface;
use App\Domain\Checkout;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->any('/', function (Request $request, Response $response) {
        /** @var Engine $view */
        $view = $this->get(EngineInterface::class);
        $html = $view->render('index.phtml', ['checkout' => Checkout::provide()]);
        $response->getBody()->write($html);
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
