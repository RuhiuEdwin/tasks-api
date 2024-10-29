# Task Management API

## Overview

This API provides a simple task management system where users can create, read, update, and delete tasks. It includes features such as filtering tasks, pagination, and searching by title.

## Setup

### Prerequisites

-   PHP >= 8.0
-   Composer
-   PostgreSQL

### Installation Steps

1. **Clone the repository**:

    ```bash
    git clone <repository_url>

    ```

2. **Install dependencies**:

    ```bash
    composer install

    ```

3. **Set up environment variables**:

    ```bash
    cp .env.example .env

    ```

4. **Run database migrations**:

    ```bash
    php artisan migrate

    ```

5. **Start the Lumen server**:
    ```bash
    php -S localhost:8000 -t public
    ```

## API Endpoints

1. **Create a Task**:
    ```bash
     Endpoint: POST /api/v1/tasks
    ```

#### Description:

    Create a new task.

#### Required Fields:

    title: Unique title for the task.
    due_date: Future date for the task completion.

2. **Get All Tasks**:
    ```bash
     Endpoint: GET /api/v1/tasks
    ```

#### Description:

    Retrieve a list of all tasks.

#### Optional Filters:

    status: Filter by task status (e.g., pending, completed).
    due_date: Filter tasks by due date.
    title: Search tasks by title (case-insensitive).

3. **Get a Specific Task**:

    ```bash
     Endpoint: GET /api/v1/tasks/{id}
    Description: Retrieve a specific task by its ID.

    ```

4. **Update a Task**:
    ```bash
     Endpoint: PUT /api/v1/tasks/{id}
    ```

#### Description:

    Update an existing task.

#### Optional Fields:

    title: New title for the task.
    description: Updated description.
    status: Updated status (pending or completed).
    due_date: New due date.

5. **Delete a Task**:
    ```bash
     Endpoint: DELETE /api/v1/tasks/{id}
    ```

#### Description:

    Delete a task by its ID.

## Example Usage

You can use tools like Postman or cURL to test the API endpoints.

### Example cURL Requests

1. **Create a Task**:

    ```bash
    curl -X POST http://localhost:8000/api/v1/tasks \
    -H "Content-Type: application/json" \
    -d '{"title": "My Task", "due_date": "2024-12-31"}'

    ```

2. **Get All Tasks**:

    ```bash
    curl -X GET http://localhost:8000/api/v1/tasks

    ```

3. **Get a Specific Task**:

    ```bash
    curl -X GET http://localhost:8000/api/v1/tasks/1

    ```

4. **Update a Task**:

    ```bash
    curl -X PUT http://localhost:8000/api/v1/tasks/1 \
    -H "Content-Type: application/json" \
    -d '{"title": "Updated Task", "status": "completed"}'

    ```

5. **Delete a Task**:

    ```bash
    curl -X DELETE http://localhost:8000/api/v1/tasks/1
    ```

## Author

-   [@ruhiuedwin](https://www.github.com/ruhiuedwin)

## 🔗 Links

-   [![github](https://img.shields.io/badge/github-000?style=for-the-badge&logo=github&logoColor=white)](https://www.github.com/ruhiuedwin)
-   [![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://ruhiuedwin.github.io/)
-   [![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/edwin-ruhiu/)

## License

This project is licensed under the MIT License.
