<?php

use Faker\Factory;
use \Illuminate\Support\MessageBag;
use LaravelBook\Ardent\Ardent;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    protected $faker;

    public function __construct() {

        $this->faker = Factory::create();
    }

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication() {

        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__ . '/../../bootstrap/start.php';
    }

    public function setUp() {

        parent::setUp();

        Artisan::call('migrate');
        Mail::pretend();
    }

    protected function assertErrorForFieldOnly(MessageBag $messageBag, $validationFailedField, $fieldErrorCount = 1) {

        $this->assertString($validationFailedField, '$validationFailedField');
        $this->assertInteger($fieldErrorCount, '$fieldErrorCount');

        //var_dump($messageBag);
        $this->assertEquals($fieldErrorCount, $messageBag->count(), 'Mismatch in expected error count');
        $this->assertEquals($fieldErrorCount, count($messageBag->get($validationFailedField)),
            "Mismatch in expected error count for $validationFailedField field");
    }

    protected function assertSaveFailure(Ardent $model, $validationFailedField, $fieldErrorCount = 1) {

        $result = $model->save();
        $this->assertFalse($result, 'Mismatch in expected save failure');
        $this->assertErrorForFieldOnly($model->validationErrors, $validationFailedField, $fieldErrorCount);
    }

    protected function assertSave(Ardent $model) {

        $result = $model->save();
        $this->assertTrue($result, 'Mismatch in expected successful save');
    }

    protected function assertString($variable, $variableName) {

        if(!is_string($variable)) {

            trigger_error($variableName . ':' . $variable . ' should be a string.');
        }
    }

    protected function assertInteger($variable, $variableName) {

        if(!is_integer($variable)) {

            trigger_error($variableName . ':' . $variable . ' should be an integer.');
        }
    }
}
