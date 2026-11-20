<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Интерстеллар',
                'genre' => 'Фантастика',
                'year' => 2014,
                'description' => 'История путешествия через космос в поисках будущего человечества.',
                'rating' => 8.7,
                'poster' => 'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg',
            ],
            [
                'title' => 'Начало',
                'genre' => 'Фантастика',
                'year' => 2010,
                'description' => 'Специалист по проникновению в сны получает необычное задание.',
                'rating' => 8.8,
                'poster' => 'https://image.tmdb.org/t/p/w500/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg',
            ],
            [
                'title' => 'Побег из Шоушенка',
                'genre' => 'Драма',
                'year' => 1994,
                'description' => 'История дружбы, надежды и свободы в тюрьме.',
                'rating' => 9.3,
                'poster' => 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg',
            ],
            [
                'title' => 'Крестный отец',
                'genre' => 'Криминал',
                'year' => 1972,
                'description' => 'История семьи Корлеоне и мира организованной преступности.',
                'rating' => 9.2,
                'poster' => 'https://image.tmdb.org/t/p/w500/3bhkrj58Vtu7enYsRolD1fZdja1.jpg',
            ],
            [
                'title' => 'Матрица',
                'genre' => 'Фантастика',
                'year' => 1999,
                'description' => 'Программист узнаёт, что привычная реальность может быть иллюзией.',
                'rating' => 8.7,
                'poster' => 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg',
            ],
            [
                'title' => 'Темный рыцарь',
                'genre' => 'Боевик',
                'year' => 2008,
                'description' => 'Бэтмен противостоит преступнику, который хочет погрузить город в хаос.',
                'rating' => 9.0,
                'poster' => 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg',
            ],
            [
                'title' => 'Форрест Гамп',
                'genre' => 'Драма',
                'year' => 1994,
                'description' => 'Необычная жизнь человека, который становится свидетелем истории.',
                'rating' => 8.8,
                'poster' => 'https://image.tmdb.org/t/p/w500/arw2vcBveWOVZr6pxd9XTd1TdQa.jpg',
            ],
            [
                'title' => 'Властелин колец',
                'genre' => 'Фэнтези',
                'year' => 2001,
                'description' => 'Путешествие по Средиземью ради уничтожения могущественного кольца.',
                'rating' => 8.9,
                'poster' => 'https://image.tmdb.org/t/p/w500/5VTN0pR8gcqV3E1gB0zT0x2V7aB.jpg',
            ],
            [
                'title' => 'Остров проклятых',
                'genre' => 'Триллер',
                'year' => 2010,
                'description' => 'Расследование исчезновения пациентки психиатрической клиники.',
                'rating' => 8.5,
                'poster' => 'https://image.tmdb.org/t/p/w500/kve20tXwUZpu4YjY6aQj5F4v.jpg',
            ],
            [
                'title' => 'Гладиатор',
                'genre' => 'Исторический',
                'year' => 2000,
                'description' => 'Римский полководец становится гладиатором и ищет справедливость.',
                'rating' => 8.5,
                'poster' => 'https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::updateOrCreate(
                ['title' => $movie['title']],
                $movie
            );
        }
    }
}
