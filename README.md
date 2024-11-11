# PHP Github User Activity CLI

A simple command line interface (CLI) to fetch the recent activity of a GitHub user built with PHP and Github API. This project is inspired by [roadmap.sh](https://roadmap.sh/projects/github-user-activity).

## Feature

- Fetch recent activities of a GitHub user.
- Display a variety of activities including repository creation, commits, branch creation, and starred repositories.
- Simple, clear output for easy tracking of a user's GitHub contributions.

## Prerequisites

To run this CLI tool, you’ll need:

- **PHP**: Version 7.4 or newer

## How to install

1. Clone the repository

   ```shell script
   git clone https://github.com/krisnaajiep/php-github-user-activity-cli.git
   ```

2. Change the current working directory

   ```shell script
   cd path/php-github-user-activity-cli
   ```

3. Run the Github User Activity CLI
   ```shell script
   php github-activity.php
   ```

## How to use

Usage: `php github-activity.php <github-username>`

### Example

```shell script
php github-activity.php krisnaajiep
```

```
Output:

- Pushed 2 commits to krisnaajiep/laravel-expense-tracker-api
- Created new branch [main] in krisnaajiep/laravel-blogging-platform-api
- Created new repository krisnaajiep/laravel-blogging-platform-api
- Pushed 1 commit to krisnaajiep/php-todo-list-api
- Pushed 1 commit to krisnaajiep/php-todo-list-api
- Pushed 1 commit to krisnaajiep/php-todo-list-api
- Pushed 1 commit to krisnaajiep/php-todo-list-api
- Pushed 1 commit to krisnaajiep/php-todo-list-api
- Created new branch [main] in krisnaajiep/php-todo-list-api
- Created new repository krisnaajiep/php-todo-list-api
- Starred firebase/php-jwt
- Pushed 2 commits to krisnaajiep/php-weather-api
- Pushed 1 commit to krisnaajiep/php-weather-api
- Starred predis/predis
- Starred vlucas/phpdotenv
- Pushed 1 commit to krisnaajiep/php-weather-api
- Pushed 1 commit to krisnaajiep/php-weather-api
- Pushed 1 commit to krisnaajiep/laravel-expense-tracker-api
- Pushed 1 commit to krisnaajiep/php-weather-api
- Pushed 1 commit to krisnaajiep/php-weather-api
- Created new branch [main] in krisnaajiep/php-weather-api
- Created new repository krisnaajiep/php-weather-api
- Starred krisnaajiep/laravel-expense-tracker-api
- Starred krisnaajiep/php-github-user-activity-cli
- Starred krisnaajiep/php-task-tracker-cli
- Starred krisnaajiep/php-expense-tracker-cli
- Starred krisnaajiep/php-unit-converter
- Starred krisnaajiep/php-number-guessing-game
- Starred krisnaajiep/php-personal-blog
- Pushed 1 commit to krisnaajiep/php-personal-blog
```
