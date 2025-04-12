<?php

namespace App\Commands\Database;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Setup extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'Database';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'db:setup';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Run the command to set up the database in the application.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'db:setup [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '-r' => 'Does a rollback followed by a latest to refresh the current state of the database',
        '-s' => 'Seed the database',
    ];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        try {
            if (array_key_exists('r', $params) || CLI::getOption('r')) {
                $this->call('migrate:rollback');
            }

            $this->call('migrate', ['all' => true]);

            if (array_key_exists('s', $params) || CLI::getOption('s')) {
                $this->call('db:seed', ['DatabaseSeeder']);
            }
        } catch (\Exception $e) {
            $this->showError($e);
        }
    }
}
