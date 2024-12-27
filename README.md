# PHP GitHub User Activity
> Simple command line interface (CLI) built with PHP to fetch the recent activity of a GitHub user and display it in the terminal.

## Table of Contents
* [General Info](#general-information)
* [Technologies Used](#technologies-used)
* [Features](#features)
* [Setup](#setup)
* [Usage](#usage)
* [Project Status](#project-status)
* [Acknowledgements](#acknowledgements)

## General Information
PHP GitHub User Activity is a simple Command Line Interface accept the GitHub username as an argument, fetch the user’s recent activity using the GitHub API, and display it in the terminal. This project is designed to explore and practice working with the Command Line Interface (CLI) and GitHub API in PHP.

## Technologies Used
- PHP - version 8.3.6

## Features

- Fetch recent activities of a GitHub user.
- Display a variety of activities including repository creation, commits, branch creation, and starred repositories.
- Simple, clear output for easy tracking of a user's GitHub contributions.

## Setup
To run this CLI tool, you’ll need:
- **PHP**: Version 7.4 or newer

How to install:
1. Clone the repository

   ```bash
   git clone https://github.com/krisnaajiep/php-github-user-activity-cli.git
   ```

2. Change the current working directory

   ```bash
   cd path/php-github-user-activity-cli
   ```

3. Run the Github User Activity CLI
   ```bash
   php github-activity.php
   ```

## Usage
```bash
php github-activity.php <github-username>`
```

Example Output:
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

## Project Status
Project is: _complete_.

## Acknowledgements
This project was inspired by [roadmap.sh](https://roadmap.sh/projects/github-user-activity).
