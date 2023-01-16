This task management application is designed to help users easily store, update, view, filter, and search tasks according to their specific needs.
Users can easily add new tasks, edit existing ones, and view their task list in a clear and organized manner. 
The application also allows users to filter their tasks by various criteria, such as name, position, priority level, and description. Additionally, the application's powerful search function allows users to quickly find the tasks they need, even among large numbers of tasks.

Before using this task management application, it is important to check the version of PHP that is installed on your computer. If the version is below 8, you will need to run the command "composer update" in order to ensure that the application runs smoothly. This command will update the necessary components and dependencies to the latest version, allowing the application to function properly. Additionally, it will ensure that you have the most up-to-date security features and performance enhancements.
Than you have to run the command php artisan key:generate

Once you have run the "composer update" command and ensured that the correct version of PHP is installed, you can proceed to open the ".env" file. In this file, look for the "db_name" field and change it to "task-app". This will set the database name for the application to "task-app".

After that, you can run the command "php artisan migrate" to create the database tables required by the application. This command will create the necessary tables in the "task-app" database, allowing you to store and manage your tasks.

Make sure that you have a database instance running on your local machine or remote server to be able to connect to it , otherwise you need to create one or configure the database credentials properly in the .env file before running the migration command. 

It is important to note that you should run the PositionSeeder, PrioritySeeder and TaskSeeder before running the SubTaskSeeder, since the subtasks table depends on the tasks table, and the tasks table depends on the positions and priorities table. So the correct order should be:

Run the command "php artisan db:seed --class=PositionSeeder" to seed positions data
Run the command "php artisan db:seed --class=PrioritiesSeeder" to seed priorities data
Run the command "php artisan db:seed --class=TaskSeeder" to seed tasks data
Run the command "php artisan db:seed --class=SubTaskSeeder" to seed subtasks data

This way you will avoid any conflicts or errors that may occur due to the dependencies of the tables.


After successfully running the seeder commands and filling the tables with data, you can now run the command "php artisan serve" to start the application.

This command will start a local development server, which will host the application on your computer. It will also provide you with a local URL, such as "http://127.0.0.1:8000" or "http://localhost:8000", which you can use to access the application in your web browser.


To test the application, you will first need to create a user by sending a request to the Postman API at the URL "http://localhost:8000/api/signup".

You can use Postman, a popular API development tool, to send an HTTP request to the signup endpoint. You will need to set the request method to POST, and in the body of the request, you will need to include the user's information such as email, name, password, password_confirmation.

You need to include a JSON object that contains the user's name, email, password, and password confirmation. For example:

{
    "name":"art",
    "email":"art@gmail.com",
    "password":"123123123",
    "password_confirmation":"123123123"
}

Once you have sent the request, the application will create a new user with the provided information, and you can use that user to test the other features of the application, such as creating, editing, and deleting tasks.

After creating a user and verifying that it was created successfully, you will need to log in to the application by sending a POST request to the URL "http://localhost:8000/api/login" using Postman.

In the request body, include a JSON object with the user's email and password. For example:

{
    "email":"art@gmail.com",
    "password":"123123123"
}
The application will then verify the provided email and password and, if they are correct, it will generate a Bearer token. This token is a secure way of identifying the user and allowing them to access the protected routes and features of the application.

You will need to use this token in the Authorization header of every request that you send to protected routes, usually the format of the token is "Bearer <token>".

Once you have logged in to the application and obtained a Bearer token, you can retrieve all the tasks from the database by sending a GET request to the URL "http://localhost:8000/api/tasks" using Postman.

You will need to set the request method to GET and include the Bearer token in the Authorization header.

The application will then return a JSON object containing all the tasks from the database, including information such as task name, description, due date, completion status, and other relevant fields.

You can retrieve a specific task by its ID by sending a GET request to the URL "http://localhost:8000/api/tasks/{id}" using Postman, where {id} is the ID of the task you want to retrieve.

For example, if you want to retrieve the task with ID 100, you would send a GET request to the URL "http://localhost:8000/api/tasks/100" .
You can also use this endpoint to update or delete a specific task by using PUT or DELETE request methods and providing the task information in the body of the request.

to add a new task to the database you will need to send a POST request to the URL "http://localhost:8000/api/tasks" using Postman.

In the request body, include a JSON object with the task's information, such as its name, description, position, and priority.

For example:

{
    "name":"task1",
    "description":"test",
    "position":"3",
    "priority_id":"1"
}

You also need to go to the headers tab in Postman and add a key "Content-Type" with value "application/json" and "Accept" with value "application/json" in order to set the content-type header to json.

To add a new subtask to the database, you will need to send a POST request to the URL "http://localhost:8000/api/tasks/subtask" using Postman.

In the request body, include a JSON object with the subtask's information, such as its name, description, position, and the task_id it belongs to.

For example:

{
    "name":"subtask",
    "description":"test",
    "position":"3",
    "task_id":"1"
}
To update a subtask, you would use the same process as adding a new one, but you would need to change the method to PUT instead of POST.


You can calculate the time spent on a task by storing the start and end time of the task in the task table.

You can use the "created_at" field to store the start time of the task and the "finished_at" field to store the end time of the task.

You can update the task by sending a PUT request to the URL "http://127.0.0.1:8000/api/tasks/{id}" using Postman, where {id} is the ID of the task you want to update.

In the request body, you would include the updated task information such as name, description, position, priority_id and finished_at.

For example:
{
"name":"task1",
"description":"test",
"position":"3",
"priority_id":"1",
"finished_at":"2023-01-19 09:19:18"
}

The same goes for subtasks, you can use the "created_at" field to store the start time of the subtask and the "finished_at" field to store the end time of the subtask.

You can update the subtask by sending a PUT request to the URL "http://127.0.0.1:8000/api/tasks/subtask/{id}" using Postman, where {id} is the ID of the subtask you want to update.

In the request body, you would include the updated subtask information such as name, description, position, task_id and finished_at.

For example:
{
"name":"subtask1",
"description":"test",
"position":"3",
"task_id":"1",
"finished_at":"2023-01-19 09:19:18"
}

You can then use the start and end times to calculate the time spent on the task or subtask by subtracting the start time from the end time.

The value should be in the correct format (YYYY-MM-DD HH:MM:SS) and should be later than the "created_at" value.

To delete a subtask, you would need to send a DELETE request to the URL "http://localhost:8000/api/tasks/subtask/{id}" using Postman, where {id} is the ID of the subtask you want to delete.

To sort tasks in ascending or descending order, you can send a GET request to the URL "http://127.0.0.1:8000/api/tasks/sort/{order}" using Postman, where {order} is either "asc" for ascending order or "desc" for descending order.
To search for a specific task, you can send a GET request to the URL "http://127.0.0.1:8000/api/tasks/search/{term}" using Postman, where {term} is the search term you want to use.

To log out of the application, you can send a GET request to the URL "http://127.0.0.1:8000/api/logout" using Postman.

You should also include the Bearer token in the Authorization header.

The application will then log out the user, invalidating the current token, and preventing further access to the protected routes.


Postman Collection

https://api.postman.com/collections/25314842-815a27ef-6508-4f06-9cb7-1b34d3a6f010?access_key=PMAT-01GPXCDNBFZYG4DETMS1ESEM29 