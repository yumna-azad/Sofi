# API Authentication Documentation

This application uses Laravel Sanctum for API authentication.

## Authentication Endpoints

### Login
POST /api/login
- Requires: email, password
- Returns: Authentication token

### Register
POST /api/register
- Requires: name, email, password
- Returns: Authentication token

### Protected Endpoints
All protected endpoints require Bearer token in Authorization header:
- GET /api/user - Get authenticated user
- GET /api/orders - List user orders
- POST /api/orders - Create order
- GET /api/orders/{id} - Get order details 