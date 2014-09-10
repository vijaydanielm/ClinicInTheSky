<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

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

    protected function assertErrorForFieldOnly($messageBag, $field, $fieldErrorCount = 1) {

        var_dump($messageBag);
        $this->assertEquals($fieldErrorCount, $messageBag->count(), 'Mismatch in expected error count');
        $this->assertEquals($fieldErrorCount, count($messageBag->get($field)), "Mismatch in expected error count for $field field");
    }
}
