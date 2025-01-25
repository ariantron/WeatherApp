[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

# WeatherApp

## About The Project

A full-stack weather application that allows users to submit jobs for retrieving weather information asynchronously.
The application enables users to fetch weather data for specific locations using a queue-based processing system.

Key Features:
- Asynchronous job processing for weather data retrieval
- Support for city name or latitude/longitude location inputs
- Responsive frontend with loading indicators
- Database storage of weather results

### Built With

- ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
- ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
- ![Postgres](https://img.shields.io/badge/postgres-%23316192.svg?style=for-the-badge&logo=postgresql&logoColor=white)
- ![TypeScript](https://img.shields.io/badge/typescript-%23007ACC.svg?style=for-the-badge&logo=typescript&logoColor=white)
- ![Vite](https://img.shields.io/badge/vite-%23646CFF.svg?style=for-the-badge&logo=vite&logoColor=white)
- ![React](https://img.shields.io/badge/react-%2320232a.svg?style=for-the-badge&logo=react&logoColor=%2361DAFB)



## Getting Started

### Prerequisites

* PHP 8.x
* Composer
* Node.js
* npm

### Installation

1. Clone the repository
```bash
git clone https://github.com/ariantron/weatherapp.git
cd weatherapp
```

2. Backend Setup (Laravel)
```bash
cd WeatherLaravelApp
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```

3. Frontend Setup (React)
```bash
cd WeatherReactApp
npm install
cp .env.example .env # Fill the backend url (VITE_API_URL)
```

### Running the Application

```bash
# Start Laravel backend
php artisan serve

# Start React frontend
npm run dev
```

### Testing

```bash
# Laravel backend tests
cd WeatherLaravelApp
php artisan test

# React frontend tests
cd WeatherReactApp
npm run test
```

## License

Distributed under the MIT License.

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/ariantron/WeatherApp.svg?style=for-the-badge
[contributors-url]: https://github.com/ariantron/WeatherApp/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/ariantron/WeatherApp.svg?style=for-the-badge
[forks-url]: https://github.com/ariantron/WeatherApp/network/members
[stars-shield]: https://img.shields.io/github/stars/ariantron/WeatherApp.svg?style=for-the-badge
[stars-url]: https://github.com/ariantron/WeatherApp/stargazers
[issues-shield]: https://img.shields.io/github/issues/ariantron/WeatherApp.svg?style=for-the-badge
[issues-url]: https://github.com/ariantron/WeatherApp/issues
[license-shield]: https://img.shields.io/github/license/ariantron/WeatherApp.svg?style=for-the-badge
[license-url]: https://github.com/ariantron/WeatherApp/blob/master/LICENSE.txt
