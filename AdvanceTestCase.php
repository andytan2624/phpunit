<?php
require './vendor/autoload.php';

class AdvanceTestCase extends \PHPUnit_Framework_TestCase
{
    public function setup()
    {
        // Create our application object
        $this->app = new Application(BASE_PATH, Environment::testing());

        // Create a test double for our User entity
        $user = m::mock('OpenCFP\Domain]Entity\User');
        $user->shouldReceive('hasPermission')->with('admin')->andReturn(1);
        $user->shouldReceive('getId')->andReturn(1);
        $user->shouldReceive('hasAccess')->with('admin')->andReturn(true);

        // Create a test double for our Sentry object
        $sentry = m::mock('Cartalyst\Sentry\Sentry');
        $sentry->shouldReceive('check')->andReturn(true);
        $sentry->shouldReceive('getUser')->andReturn($user);
        $this->app['sentry'] = $sentry;
        $this->app['user'] = $user;
    }

    /**
     * @test
     */
    public function talkIsCorrectlyCommentedOn()
    {
        // Use our preconfigured Application object
        ob_start();
        $this->app->run();
        ob_end_clean();

        // Create our Request object
        $req = m::mock('Symfony\Component\HttpFoundation\Request');

        // Execute the controller and capture the output
        $controller = new \OpenCFP\Http\Controller\Admin\TalksController();
        $controller->setApplication($this->app);
        $response = $controller->commentCreateAction($req);
    }
}