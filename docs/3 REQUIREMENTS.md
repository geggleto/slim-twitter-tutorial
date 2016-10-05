# Project Requirements

## What is Twitter?

Twitter is a feed of 140 character messages.

## What are the features of Twitter?

- Register
- Login/Logout
- Tweet Something
- Get Tweet Feed
- Follow/Unfollow someone
- Direct mail someone
- Edit Profile

## Technical Requirements API

These system calls will be prefixed with `/api`

### Create user
- POST /user

### Authentication modifying routes

- POST /login
- GET /logout

### Secure Routes

- POST /tweet
- POST /follow/{user}
- DELETE /follow/{user}
- POST /dmail/{user}
- GET /feed
- PUT /profile