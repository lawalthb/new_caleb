# PHP Technical test

During this test you are supposed to create a simple API that will serve as the back-end for a potential mobile app. The requirements of this API are:

- The API should be built using the latest version of Laravel
- All API returns should be JSON formatted and contain the appropiate HTML response codes
- The users table should at least contain the following fields:
  - name
  - email address
  - password
- The API should have to following endpoints: (It is up to you to separate them into protected/unprotected endpoints)
  - Add new user
  - Authenticate user
  - Get a list of all users
  - Get any user's details
  - Update current (authenticated) user details
  - Deactivate current (authenticated) user account (should delete the user entry)

Extra credit will be awarded for the following new tasks/endpoints (only if the required ones are completed)
  - Task: Write tests for at least three of the previous endpoints
  - Task: Create an additional model, controller and migration for a messages table. The messages table should contain user_id, message and the default timestamps fields.
  - Endpoint: The current user can post a messsage
  - Endpoint: Get a list of all the messages
  - Endpoint: User can delete one of his messages by passing a messageID
