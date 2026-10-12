# Dinas PUPR Kabupaten Bombana Website

A company profile website developed for the Public Works and Spatial Planning Agency of Bombana Regency as part of a software development project at Smart Inovasi Software House.

## Overview

This project provides a web platform for presenting the agency's organizational information and public-facing content.

## Tech Stack

- **Language:** PHP
- **Framework:** Laravel
- **Admin Panel:** Filament
- **Styling:** Tailwind CSS
- **Frontend Build Tool:** Vite

## My Contributions

- Developed website components and functionality for the agency's company profile.
- Implemented revisions and improvements based on feedback from the development team.

## Getting Started

### Prerequisites

Ensure the following tools are installed:

- PHP (compatible with the project's requirements)
- Composer
- Node.js and npm
- A database configured for the application, if required

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/fadhlimuhammad/pupr-bombana.git
   cd pupr-bombana
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Create the environment configuration:

   ```bash
   cp .env.example .env
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Configure the required environment variables in `.env`, including the database connection if applicable.

6. Install frontend dependencies and build the assets:

   ```bash
   npm install
   npm run build
   ```

7. Run database migrations if required by the application:

   ```bash
   php artisan migrate
   ```

8. Start the local development server:

   ```bash
   php artisan serve
   ```

   Open the local URL displayed in your terminal.

## Project Status

Developed and deployed as part of a software development project at Smart Inovasi Software House.

## Notes

This repository represents a professional project. Please ensure that any redistribution or reuse of its source code is authorized by the relevant project owner.
