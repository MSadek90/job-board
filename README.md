<?php
# Job Board

A Laravel-based job board application with posts, comments, and tags management system.

## Project Status

🚧 **Under Development** - This project is actively being developed and new features are being added.

## Features

- **Posts Management** - Create, read, update, and delete job posts
- **Comments System** - Add comments to posts with author information
- **Tags System** - Organize posts with tags for better categorization
- **RESTful API** - API endpoints for posts management
- **Database Relationships** - Proper Eloquent relationships between posts, comments, and tags

## Tech Stack

- **Backend**: Laravel 12.0
- **Frontend**: Blade Templates with Tailwind CSS 4.0
- **Database**: SQLite (default), supports MySQL, PostgreSQL, etc.
- **Testing**: Pest PHP 4.1
- **Build Tool**: Vite 7.0

## Requirements

- PHP 8.2 or higher
- Node.js 25 (see .nvmrc)
- Composer
- npm or yarn

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd job-board
   ```

2. **Run setup script**
   ```bash
   composer run setup
   ```

   This will:
   - Install PHP dependencies
   - Create `.env` file from `.env.example`
   - Generate application key
   - Run database migrations
   - Install npm dependencies
   - Build frontend assets

## Development

### Start the development server

```bash
composer run dev
```

This runs concurrently:
- Laravel development server
- Queue listener
- Vite development server

### Build for production

```bash
npm run build
```

## Project Structure

```
├── app/
│   ├── Http/Controllers/     # Application controllers
│   └── Models/               # Eloquent models
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── routes/
│   ├── web.php              # Web routes
│   └── api.php              # API routes
├── resources/
│   ├── views/               # Blade templates
│   ├── css/                 # Stylesheets
│   └── js/                  # JavaScript files
└── tests/                   # Test files
```

## API Endpoints

### Posts
- `GET /api/posts` - List all posts (paginated)
- `POST /api/posts` - Create a new post
- `GET /api/posts/{id}` - Get a specific post
- `PUT /api/posts/{id}` - Update a post
- `DELETE /api/posts/{id}` - Delete a post

## Testing

Run tests with:

```bash
composer run test
```

## Coming Soon

- Enhanced UI/UX improvements
- Additional features and optimizations
- Comprehensive documentation

## License

This project is licensed under the MIT License.

---

For more information, refer to the [Laravel documentation](https://laravel.com/docs).
