# To-Do List

## Overview

This project is a To-Do List application built with Laravel, Tailwind CSS, and plain JavaScript. It allows users to create boards with default columns ("To Do," "In Progress," and "Done"), create and manage tasks within those columns, and use labels to provide additional information about tasks. The project aims to showcase my skills and serves as a potential addition to their portfolio.

## Features

- **User Authentication**: User authentication is managed using Laravel Breeze for web routes and Laravel Sanctum for API authentication.

- **Database Structure**: The application uses a database with tables for boards, cards, tasks, and labels, connected via relationships. This allows for structured data storage and retrieval.

- **Frontend**: The frontend is primarily built with Laravel Blade and plain JavaScript. Future plans include exploring frontend frameworks like Laravel Livewire to enhance the user experience.

- **Labels**: Labels are currently used to provide additional information about tasks. Future updates may include sorting and categorization features.

- **Drag and Drop**: Custom drag-and-drop functionality is implemented for task management, allowing users to move tasks between columns within boards.

- **Planned Features**: Future plans for the project include multiple user support on a board, task assignment, and additional label functionality.

## Installation

To run the project locally, follow these steps:

1. Clone the repository.

2. Install dependencies using Composer and NPM.

3. Set up the environment variables and configure the `.env` file.

4. Migrate the database and seed it with sample data. (php artisan migrate:fresh --seed)

5. Start the development server. (php artisan serve, npm run dev)

6. Access the application in your web browser at `http://localhost:8000` by default.

## Usage

- Register or log in to create a new board.

- Within a board, create tasks with names, descriptions, due dates, and labels.

- Use drag-and-drop functionality to move tasks between columns.

- Edit board details, including name, description, and labels.

## Future Plans

- Implement multi-user support on a board.

- Add task assignment functionality.

- Enhance label features for sorting and categorization.

## Deployment

Currently, the application is not deployed.

## Development Environment

- Laravel version: 10.15.0

- Tailwind CSS version: 3.3.3

- Node.js version: 9.5.0

- PHP version: 8.1.12