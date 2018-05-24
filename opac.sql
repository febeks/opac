-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 24. kvě 2018, 22:23
-- Verze serveru: 10.1.31-MariaDB
-- Verze PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `opac`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `book_cat`
--

CREATE TABLE `book_cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `book_cat`
--

INSERT INTO `book_cat` (`id`, `name`, `keywords`, `image_path`) VALUES
(1, 'Abeceda', 'pismena,abeceda,skola,citanie,kniha', 'img/cat-abc.png'),
(2, 'Cisla', 'cisla,matematika,pocitanie,skola', 'img/cat-123.png'),
(3, 'Farby', 'farby,malovanie,malovanka,ceruzka,farbicka,kreslenie,kreslit', 'img/cat-colors.png'),
(4, 'Princezne', 'princezna,kralovna,rozpravka,kralovstvo,princ', 'img/cat-princess.png'),
(5, 'DopravnÃ© prostriedky', 'doprava,dopravnÃ© prostriedky,auto,kolobeÅ¾ka,bicykel,hasiÄi,hasiÄ,elektriÄka,autobus,polÃ­cia,vlak,vlÃ¡Äik,autÃ­Äko', 'img/cat-truck.png'),
(6, 'ZvieratÃ¡', 'pes, psik, macka, macicka, maciatko, krava, kravicka, opica, vtak, vtacik, krokodil, srna, zver, dobytok, zebra, kobyla, sova', 'img/cat-pets.png'),
(7, 'Hudba a hudobnÃ© nÃ¡stroje', 'hudba, muzika, pesniÄka, pieseÅˆ, spievanka, hudobnÃ½ nÃ¡stroj, gitara, harmonika, saxofÃ³n, mikrofÃ³n, tanec, klavÃ­r, bÃ¡sniÄka', 'img/hudba.png'),
(9, 'MÃ¡gia a kÃºzla', 'mÃ¡gia, kÃºzla, kÃºzelnÃ­k, Äary, triky, ÄarovnÃ½ klobÃºk, zÃ¡zraky', 'img/kuzla.png'),
(10, 'Ovocie a zelenina', 'ovocie, zelenina, jablko, hruÅ¡ka, banÃ¡n, kiwi, mandarinka, pomaranÄ, hrozno, ananÃ¡s, ÄuÄoriedka, melÃ³n, malina, zemiak, mrkva, mrkviÄka, kalerÃ¡b, petrÅ¾len, kapusta, kukurica, paradajka, paprika', 'img/ovocieZelenina.png'),
(11, 'RozprÃ¡vky', 'rozprÃ¡vka, prÃ­beh, poviedka, rozprÃ¡vanie, prÃ­hoda', 'img/rozpravky.png'),
(12, 'Å port', 'Å¡port, futbal, hokej, tenis, lopta, puk, volejbal, basketbal, pingpong, beh, trÃ©ning, pÃ­Å¡Å¥alka, trÃ©ner, tÃ­m, spoluhrÃ¡Ä, ', 'img/sport.png');

-- --------------------------------------------------------

--
-- Struktura tabulky `book_filter`
--

CREATE TABLE `book_filter` (
  `id` int(10) UNSIGNED NOT NULL,
  `filter_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `game`
--

CREATE TABLE `game` (
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `game_id` int(11) NOT NULL,
  `big_icon_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `embed` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `game`
--

INSERT INTO `game` (`name`, `game_id`, `big_icon_path`, `height`, `width`, `embed`) VALUES
('Rock Wheels', 2269, '//static.miniclipcdn.com/content/game-icons/medium/rockwheels.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;rock-wheels&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/rock-wheels/&quot;&gt;Play Rock Wheels&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/rock-wheels/&quot; target=&quot;_blank&quot;&gt;Play Rock Wheels&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('8 Ball Pool', 2471, '//static.miniclipcdn.com/content/game-icons/medium/8-Ball-Pool_26-02-2015.jpg', 520, 750, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;8-ball-pool-multiplayer&quot; data-theme=&quot;0&quot; data-width=&quot;750&quot; data-height=&quot;520&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/8-ball-pool-multiplayer/&quot;&gt;Play 8 Ball Pool&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/8-ball-pool-multiplayer/&quot; target=&quot;_blank&quot;&gt;Play 8 Ball Pool&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&g'),
('Ninja Force', 3141, '//static.miniclipcdn.com/content/game-icons/medium/NinjaForce.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;ninja-force&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/ninja-force/&quot;&gt;Play Ninja Force&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/ninja-force/&quot; target=&quot;_blank&quot;&gt;Play Ninja Force&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Snowfight.io', 3227, '//static.miniclipcdn.com/content/game-icons/medium/snowfight_150x110.png', 683, 1024, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;snowfight-io&quot; data-theme=&quot;0&quot; data-width=&quot;1024&quot; data-height=&quot;683&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/snowfight-io/&quot;&gt;Play Snowfight.io&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/snowfight-io/&quot; target=&quot;_blank&quot;&gt;Play Snowfight.io&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Zombie Big Trouble', 3247, '//static.miniclipcdn.com/content/game-icons/medium/zombiebigtrouble2.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;zombie-big-trouble&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/zombie-big-trouble/&quot;&gt;Play Zombie Big Trouble&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/zombie-big-trouble/&quot; target=&quot;_blank&quot;&gt;Play Zombie Big Trouble&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt'),
('Jousting', 3249, '//static.miniclipcdn.com/content/game-icons/medium/jousting.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;jousting&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/jousting/&quot;&gt;Play Jousting&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/jousting/&quot; target=&quot;_blank&quot;&gt;Play Jousting&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Desperado', 3258, '//static.miniclipcdn.com/content/game-icons/medium/desperadox.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;desperado&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/desperado/&quot;&gt;Play Desperado&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/desperado/&quot; target=&quot;_blank&quot;&gt;Play Desperado&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Zombie Trapper 2', 3322, '//static.miniclipcdn.com/content/game-icons/medium/zombietrapper2.jpg', 450, 650, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;zombie-trapper-2&quot; data-theme=&quot;0&quot; data-width=&quot;650&quot; data-height=&quot;450&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/zombie-trapper-2/&quot;&gt;Play Zombie Trapper 2&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/zombie-trapper-2/&quot; target=&quot;_blank&quot;&gt;Play Zombie Trapper 2&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Sportbike Champion', 3334, '//static.miniclipcdn.com/content/game-icons/medium/sportbikechampion.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;sportbike-champion&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/sportbike-champion/&quot;&gt;Play Sportbike Champion&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/sportbike-champion/&quot; target=&quot;_blank&quot;&gt;Play Sportbike Champion&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt'),
('River Assault', 3398, '//static.miniclipcdn.com/content/game-icons/medium/riverassaultMEDIUMICON.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;river-assault&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/river-assault/&quot;&gt;Play River Assault&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/river-assault/&quot; target=&quot;_blank&quot;&gt;Play River Assault&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Guns Of Anarchy', 3487, '//static.miniclipcdn.com/content/game-icons/medium/gunsofanarchyv2.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;guns-of-anarchy&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/guns-of-anarchy/&quot;&gt;Play Guns Of Anarchy&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/guns-of-anarchy/&quot; target=&quot;_blank&quot;&gt;Play Guns Of Anarchy&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Drift Trike', 3489, '//static.miniclipcdn.com/content/game-icons/medium/DriftTrike.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;drift-trike&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/drift-trike/&quot;&gt;Play Drift Trike&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/drift-trike/&quot; target=&quot;_blank&quot;&gt;Play Drift Trike&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Golf Champions', 3520, '//static.miniclipcdn.com/content/game-icons/medium/golfchampions.jpg', 700, 970, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;golf-champions&quot; data-theme=&quot;0&quot; data-width=&quot;970&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/golf-champions/&quot;&gt;Play Golf Champions&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/golf-champions/&quot; target=&quot;_blank&quot;&gt;Play Golf Champions&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Western Front 1914', 3706, '//static.miniclipcdn.com/content/game-icons/medium/westernfront1914.jpg', 520, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;western-front-1914&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;520&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/western-front-1914/&quot;&gt;Play Western Front 1914&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/western-front-1914/&quot; target=&quot;_blank&quot;&gt;Play Western Front 1914&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt'),
('Jet Ski Racer', 3720, '//static.miniclipcdn.com/content/game-icons/medium/jetskiracer.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;jet-ski-racer&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/jet-ski-racer/&quot;&gt;Play Jet Ski Racer&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/jet-ski-racer/&quot; target=&quot;_blank&quot;&gt;Play Jet Ski Racer&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Zombality', 3786, '//static.miniclipcdn.com/content/game-icons/medium/zombality.jpg', 420, 853, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;zombality&quot; data-theme=&quot;0&quot; data-width=&quot;853&quot; data-height=&quot;420&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/zombality/&quot;&gt;Play Zombality&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/zombality/&quot; target=&quot;_blank&quot;&gt;Play Zombality&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Assault Course 2', 3794, '//static.miniclipcdn.com/content/game-icons/medium/assaultcourse2.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;assault-course-2&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/assault-course-2/&quot;&gt;Play Assault Course 2&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/assault-course-2/&quot; target=&quot;_blank&quot;&gt;Play Assault Course 2&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Free Running 2', 3798, '//static.miniclipcdn.com/content/game-icons/medium/freerunning2christmas.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;free-running-2&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/free-running-2/&quot;&gt;Play Free Running 2&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/free-running-2/&quot; target=&quot;_blank&quot;&gt;Play Free Running 2&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Rail Rush Worlds', 3806, '//static.miniclipcdn.com/content/game-icons/medium/RRWorlds.jpg', 640, 640, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;rail-rush-worlds&quot; data-theme=&quot;0&quot; data-width=&quot;640&quot; data-height=&quot;640&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/rail-rush-worlds/&quot;&gt;Play Rail Rush Worlds&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/rail-rush-worlds/&quot; target=&quot;_blank&quot;&gt;Play Rail Rush Worlds&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('RotorStorm', 3820, '//static.miniclipcdn.com/content/game-icons/medium/RotorStorm.jpg', 600, 960, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;rotorstorm&quot; data-theme=&quot;0&quot; data-width=&quot;960&quot; data-height=&quot;600&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/rotorstorm/&quot;&gt;Play RotorStorm&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/rotorstorm/&quot; target=&quot;_blank&quot;&gt;Play RotorStorm&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Saloon Brawl 2', 3824, '//static.miniclipcdn.com/content/game-icons/medium/saloonbrawl2.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;saloon-brawl-2&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/saloon-brawl-2/&quot;&gt;Play Saloon Brawl 2&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/saloon-brawl-2/&quot; target=&quot;_blank&quot;&gt;Play Saloon Brawl 2&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Turbo Racing 3', 3830, '//static.miniclipcdn.com/content/game-icons/medium/turboracing3.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;turbo-racing-3&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/turbo-racing-3/&quot;&gt;Play Turbo Racing 3&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/turbo-racing-3/&quot; target=&quot;_blank&quot;&gt;Play Turbo Racing 3&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Zero Gravity', 3914, '//static.miniclipcdn.com/content/game-icons/medium/ZeroGravity_v2.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;zero-gravity&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/zero-gravity/&quot;&gt;Play Zero Gravity&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/zero-gravity/&quot; target=&quot;_blank&quot;&gt;Play Zero Gravity&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Black Sun', 3950, '//static.miniclipcdn.com/content/game-icons/medium/blacksun.jpg', 540, 950, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;black-sun&quot; data-theme=&quot;0&quot; data-width=&quot;950&quot; data-height=&quot;540&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/black-sun/&quot;&gt;Play Black Sun&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/black-sun/&quot; target=&quot;_blank&quot;&gt;Play Black Sun&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('After Sunset 2', 3966, '//static.miniclipcdn.com/content/game-icons/medium/aftersunset2christmas.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;after-sunset-2&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/after-sunset-2/&quot;&gt;Play After Sunset 2&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/after-sunset-2/&quot; target=&quot;_blank&quot;&gt;Play After Sunset 2&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Marble Temple', 3994, '//static.miniclipcdn.com/content/game-icons/medium/MarbleTemple.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;marble-temple&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/marble-temple/&quot;&gt;Play Marble Temple&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/marble-temple/&quot; target=&quot;_blank&quot;&gt;Play Marble Temple&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Total Wreckage', 4030, '//static.miniclipcdn.com/content/game-icons/medium/totalwreckage.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;total-wreckage&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/total-wreckage/&quot;&gt;Play Total Wreckage&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/total-wreckage/&quot; target=&quot;_blank&quot;&gt;Play Total Wreckage&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Calabash Bros', 4058, '//static.miniclipcdn.com/content/game-icons/medium/CalabashBros.jpg', 570, 700, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;calabash-bros&quot; data-theme=&quot;0&quot; data-width=&quot;700&quot; data-height=&quot;570&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/calabash-bros/&quot;&gt;Play Calabash Bros&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/calabash-bros/&quot; target=&quot;_blank&quot;&gt;Play Calabash Bros&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Man or Monster', 4062, '//static.miniclipcdn.com/content/game-icons/medium/MoM.jpg', 640, 960, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;man-or-monster&quot; data-theme=&quot;0&quot; data-width=&quot;960&quot; data-height=&quot;640&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/man-or-monster/&quot;&gt;Play Man or Monster&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/man-or-monster/&quot; target=&quot;_blank&quot;&gt;Play Man or Monster&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Pro Kicker Frenzy', 4064, '//static.miniclipcdn.com/content/game-icons/medium/ProKickerFrenzy.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;pro-kicker-frenzy&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/pro-kicker-frenzy/&quot;&gt;Play Pro Kicker Frenzy&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/pro-kicker-frenzy/&quot; target=&quot;_blank&quot;&gt;Play Pro Kicker Frenzy&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Diablo Valley Rally', 4072, '//static.miniclipcdn.com/content/game-icons/medium/diablovalleyrally.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;diablo-valley-rally&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/diablo-valley-rally/&quot;&gt;Play Diablo Valley Rally&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/diablo-valley-rally/&quot; target=&quot;_blank&quot;&gt;Play Diablo Valley Rally&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/scri'),
('Basketball Jam Shots', 4084, '//static.miniclipcdn.com/content/game-icons/medium/basketballjamshots.jpg', 580, 750, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;basketball-jam-shots&quot; data-theme=&quot;0&quot; data-width=&quot;750&quot; data-height=&quot;580&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/basketball-jam-shots/&quot;&gt;Play Basketball Jam Shots&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/basketball-jam-shots/&quot; target=&quot;_blank&quot;&gt;Play Basketball Jam Shots&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;'),
('Wrestle Jump', 4095, '//static.miniclipcdn.com/content/game-icons/medium/WrestleJump.jpg', 540, 960, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;wrestle-jump&quot; data-theme=&quot;0&quot; data-width=&quot;960&quot; data-height=&quot;540&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/wrestle-jump/&quot;&gt;Play Wrestle Jump&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/wrestle-jump/&quot; target=&quot;_blank&quot;&gt;Play Wrestle Jump&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Supercar Showdown', 4099, '//static.miniclipcdn.com/content/game-icons/medium/supercarshowdown.jpg', 600, 800, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;supercar-showdown&quot; data-theme=&quot;0&quot; data-width=&quot;800&quot; data-height=&quot;600&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/supercar-showdown/&quot;&gt;Play Supercar Showdown&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/supercar-showdown/&quot; target=&quot;_blank&quot;&gt;Play Supercar Showdown&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('World Soccer Forever', 4117, '//static.miniclipcdn.com/content/game-icons/medium/WorldSoccerForever.jpg', 640, 960, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;world-soccer-forever&quot; data-theme=&quot;0&quot; data-width=&quot;960&quot; data-height=&quot;640&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/world-soccer-forever/&quot;&gt;Play World Soccer Forever&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/world-soccer-forever/&quot; target=&quot;_blank&quot;&gt;Play World Soccer Forever&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;'),
('Bike Rivals', 4129, '//static.miniclipcdn.com/content/game-icons/medium/BikeRivals_150x110.jpg', 507, 900, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;bike-rivals&quot; data-theme=&quot;0&quot; data-width=&quot;900&quot; data-height=&quot;507&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/bike-rivals/&quot;&gt;Play Bike Rivals&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/bike-rivals/&quot; target=&quot;_blank&quot;&gt;Play Bike Rivals&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('MiniSoccer', 4135, '//static.miniclipcdn.com/content/game-icons/medium/MiniSoccer.jpg', 700, 800, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;minisoccer&quot; data-theme=&quot;0&quot; data-width=&quot;800&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/minisoccer/&quot;&gt;Play MiniSoccer&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/minisoccer/&quot; target=&quot;_blank&quot;&gt;Play MiniSoccer&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Kind of Soccer', 4137, '//static.miniclipcdn.com/content/game-icons/medium/kindofsoccer.png', 600, 960, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;kind-of-soccer&quot; data-theme=&quot;0&quot; data-width=&quot;960&quot; data-height=&quot;600&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/kind-of-soccer/&quot;&gt;Play Kind of Soccer&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/kind-of-soccer/&quot; target=&quot;_blank&quot;&gt;Play Kind of Soccer&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('BMX Freestyle', 4142, '//static.miniclipcdn.com/content/game-icons/medium/bmxfreestyle2.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;bmxfreestyle&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/bmxfreestyle/&quot;&gt;Play BMX Freestyle&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/bmxfreestyle/&quot; target=&quot;_blank&quot;&gt;Play BMX Freestyle&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Stealth Sniper', 4143, '//static.miniclipcdn.com/content/game-icons/medium/stealthsniperv3.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;stealth-sniper&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/stealth-sniper/&quot;&gt;Play Stealth Sniper&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/stealth-sniper/&quot; target=&quot;_blank&quot;&gt;Play Stealth Sniper&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Celebrity Ice Bucket Challenge', 4169, '//static.miniclipcdn.com/content/game-icons/medium/cibcmedicon.png', 550, 800, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;celebrity-ice-bucket-challenge&quot; data-theme=&quot;0&quot; data-width=&quot;800&quot; data-height=&quot;550&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/celebrity-ice-bucket-challenge/&quot;&gt;Play Celebrity Ice Bucket Challenge&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/celebrity-ice-bucket-challenge/&quot; target=&quot;_blank&quot;&gt;Play Celebrity Ice Bucket Challenge&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//sta'),
('Cut the Rope', 4179, '//static.miniclipcdn.com/content/game-icons/medium/cuttherope.jpg', 576, 1024, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;cut-the-rope&quot; data-theme=&quot;0&quot; data-width=&quot;1024&quot; data-height=&quot;576&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/cut-the-rope/&quot;&gt;Play Cut the Rope&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/cut-the-rope/&quot; target=&quot;_blank&quot;&gt;Play Cut the Rope&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('On The Run', 4183, '//static.miniclipcdn.com/content/game-icons/medium/OnTheRun_150x110_2.jpg', 640, 960, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;on-the-run&quot; data-theme=&quot;0&quot; data-width=&quot;960&quot; data-height=&quot;640&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/on-the-run/&quot;&gt;Play On The Run&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/on-the-run/&quot; target=&quot;_blank&quot;&gt;Play On The Run&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Berry Rush', 4187, '//static.miniclipcdn.com/content/game-icons/medium/SS_icon_web_squared.jpg', 640, 640, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;berry-rush&quot; data-theme=&quot;0&quot; data-width=&quot;640&quot; data-height=&quot;640&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/berry-rush/&quot;&gt;Play Berry Rush&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/berry-rush/&quot; target=&quot;_blank&quot;&gt;Play Berry Rush&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Bow Master Halloween', 4196, '//static.miniclipcdn.com/content/game-icons/medium/bowmasterhalloween.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;bow-master-halloween&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/bow-master-halloween/&quot;&gt;Play Bow Master Halloween&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/bow-master-halloween/&quot; target=&quot;_blank&quot;&gt;Play Bow Master Halloween&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;'),
('ProBaseball', 4216, '//static.miniclipcdn.com/content/game-icons/medium/probaseball.jpg', 457, 608, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;probaseball&quot; data-theme=&quot;0&quot; data-width=&quot;608&quot; data-height=&quot;457&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/probaseball/&quot;&gt;Play ProBaseball&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/probaseball/&quot; target=&quot;_blank&quot;&gt;Play ProBaseball&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Age Of Speed Underworld', 4239, '//static.miniclipcdn.com/content/game-icons/medium/ageofspeed_150x110.jpg', 510, 680, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;age-of-speed-underworld&quot; data-theme=&quot;0&quot; data-width=&quot;680&quot; data-height=&quot;510&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/age-of-speed-underworld/&quot;&gt;Play Age Of Speed Underworld&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/age-of-speed-underworld/&quot; target=&quot;_blank&quot;&gt;Play Age Of Speed Underworld&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.j'),
('Foot Chinko', 4269, '//static.miniclipcdn.com/content/game-icons/medium/FootChinko_150x110.jpg', 600, 450, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;foot-chinko&quot; data-theme=&quot;0&quot; data-width=&quot;450&quot; data-height=&quot;600&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/foot-chinko/&quot;&gt;Play Foot Chinko&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/foot-chinko/&quot; target=&quot;_blank&quot;&gt;Play Foot Chinko&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Banana Mania', 4337, '//static.miniclipcdn.com/content/game-icons/medium/Bananamania_2_150x110.jpg', 640, 480, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;banana-mania&quot; data-theme=&quot;0&quot; data-width=&quot;480&quot; data-height=&quot;640&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/banana-mania/&quot;&gt;Play Banana Mania&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/banana-mania/&quot; target=&quot;_blank&quot;&gt;Play Banana Mania&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Sprint Club Nitro', 4339, '//static.miniclipcdn.com/content/game-icons/medium/Sprint_Club_150x110.jpg', 365, 640, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;sprint-club-nitro&quot; data-theme=&quot;0&quot; data-width=&quot;640&quot; data-height=&quot;365&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/sprint-club-nitro/&quot;&gt;Play Sprint Club Nitro&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/sprint-club-nitro/&quot; target=&quot;_blank&quot;&gt;Play Sprint Club Nitro&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Cut the Rope Time Travel', 4347, '//static.miniclipcdn.com/content/game-icons/medium/ctr_tt_150x110.jpg', 576, 1024, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;cut-the-rope-time-travel&quot; data-theme=&quot;0&quot; data-width=&quot;1024&quot; data-height=&quot;576&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/cut-the-rope-time-travel/&quot;&gt;Play Cut the Rope Time Travel&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/cut-the-rope-time-travel/&quot; target=&quot;_blank&quot;&gt;Play Cut the Rope Time Travel&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-e'),
('Agar.io', 4349, '//static.miniclipcdn.com/content/game-icons/medium/Agar.io_150x110_20150709.jpg', 1000, -1, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;agar-io&quot; data-theme=&quot;0&quot; data-width=&quot;-1&quot; data-height=&quot;1000&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/agar-io/&quot;&gt;Play Agar.io&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/agar-io/&quot; target=&quot;_blank&quot;&gt;Play Agar.io&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Hockey Stars', 4351, '//static.miniclipcdn.com/content/game-icons/medium/HS-MC-Large_Icon_150x110.jpg', 800, 1225, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;hockey-stars-multiplayer&quot; data-theme=&quot;0&quot; data-width=&quot;1225&quot; data-height=&quot;800&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/hockey-stars-multiplayer/&quot;&gt;Play Hockey Stars&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/hockey-stars-multiplayer/&quot; target=&quot;_blank&quot;&gt;Play Hockey Stars&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/sc'),
('Pilot Heroes', 4383, '//static.miniclipcdn.com/content/game-icons/medium/Pilot-Heroes_150x110.jpg', 700, 450, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;pilot-heroes&quot; data-theme=&quot;0&quot; data-width=&quot;450&quot; data-height=&quot;700&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/pilot-heroes/&quot;&gt;Play Pilot Heroes&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/pilot-heroes/&quot; target=&quot;_blank&quot;&gt;Play Pilot Heroes&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Stealth Sniper 2', 4431, '//static.miniclipcdn.com/content/game-icons/medium/StealthSniper2_150x110.jpg', 650, 1135, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;stealth-sniper-2&quot; data-theme=&quot;0&quot; data-width=&quot;1135&quot; data-height=&quot;650&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/stealth-sniper-2/&quot;&gt;Play Stealth Sniper 2&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/stealth-sniper-2/&quot; target=&quot;_blank&quot;&gt;Play Stealth Sniper 2&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Stop Trump', 4462, '//static.miniclipcdn.com/content/game-icons/medium/StopTrump_150x110.jpg', 440, 900, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;stop-trump&quot; data-theme=&quot;0&quot; data-width=&quot;900&quot; data-height=&quot;440&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/stop-trump/&quot;&gt;Play Stop Trump&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/stop-trump/&quot; target=&quot;_blank&quot;&gt;Play Stop Trump&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Basketball Stars', 4486, '//static.miniclipcdn.com/content/game-icons/medium/BasketballStars_150x110.png', 650, 650, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;basketball-stars&quot; data-theme=&quot;0&quot; data-width=&quot;650&quot; data-height=&quot;650&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/basketball-stars/&quot;&gt;Play Basketball Stars&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/basketball-stars/&quot; target=&quot;_blank&quot;&gt;Play Basketball Stars&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Thunderbirds Are Go: Team Rush', 4514, '//static.miniclipcdn.com/content/game-icons/medium/Thunderbirds_150x110_20160606.jpg', 650, 650, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;thunderbirds&quot; data-theme=&quot;0&quot; data-width=&quot;650&quot; data-height=&quot;650&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/thunderbirds/&quot;&gt;Play Thunderbirds Are Go: Team Rush&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/thunderbirds/&quot; target=&quot;_blank&quot;&gt;Play Thunderbirds Are Go: Team Rush&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/scr'),
('Euro Soccer Forever', 4573, '//static.miniclipcdn.com/content/game-icons/medium/eurosoccerforever_150x110_variation1.png', 640, 960, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;euro-soccer-forever&quot; data-theme=&quot;0&quot; data-width=&quot;960&quot; data-height=&quot;640&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/euro-soccer-forever/&quot;&gt;Play Euro Soccer Forever&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/euro-soccer-forever/&quot; target=&quot;_blank&quot;&gt;Play Euro Soccer Forever&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/scri'),
('Rio 2016 Olympic Games', 4587, '//static.miniclipcdn.com/content/game-icons/medium/Rio_icon_150x110.jpg', 640, 980, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;rio-2016-olympic-games&quot; data-theme=&quot;0&quot; data-width=&quot;980&quot; data-height=&quot;640&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/rio-2016-olympic-games/&quot;&gt;Play Rio 2016 Olympic Games&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/rio-2016-olympic-games/&quot; target=&quot;_blank&quot;&gt;Play Rio 2016 Olympic Games&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quo'),
('Super Soccer Noggins', 4589, '//static.miniclipcdn.com/content/game-icons/medium/8_super_soccer_noggins_150x110.jpg', 420, 640, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;super-soccer-noggins&quot; data-theme=&quot;0&quot; data-width=&quot;640&quot; data-height=&quot;420&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/super-soccer-noggins/&quot;&gt;Play Super Soccer Noggins&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/super-soccer-noggins/&quot; target=&quot;_blank&quot;&gt;Play Super Soccer Noggins&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;'),
('Flip Diving', 4606, '//static.miniclipcdn.com/content/game-icons/medium/flipdiving_150x110.jpg', 670, 488, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;flip-diving&quot; data-theme=&quot;0&quot; data-width=&quot;488&quot; data-height=&quot;670&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/flip-diving/&quot;&gt;Play Flip Diving&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/flip-diving/&quot; target=&quot;_blank&quot;&gt;Play Flip Diving&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Splix.io', 4624, '//static.miniclipcdn.com/content/game-icons/medium/splixio_150x110.jpg', 800, 1010, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;splixio&quot; data-theme=&quot;0&quot; data-width=&quot;1010&quot; data-height=&quot;800&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/splixio/&quot;&gt;Play Splix.io&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/splixio/&quot; target=&quot;_blank&quot;&gt;Play Splix.io&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Twisted Lines', 4629, '//static.miniclipcdn.com/content/game-icons/medium/Twisted_150.jpg', 660, 500, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;twisted-lines&quot; data-theme=&quot;0&quot; data-width=&quot;500&quot; data-height=&quot;660&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/twisted-lines/&quot;&gt;Play Twisted Lines&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/twisted-lines/&quot; target=&quot;_blank&quot;&gt;Play Twisted Lines&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Flip Master', 4801, '//static.miniclipcdn.com/content/game-icons/medium/MIN-Large_Icon_150x110.jpg', 670, 488, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;flip-master&quot; data-theme=&quot;0&quot; data-width=&quot;488&quot; data-height=&quot;670&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/flip-master/&quot;&gt;Play Flip Master&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/flip-master/&quot; target=&quot;_blank&quot;&gt;Play Flip Master&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('NoBrakes.io', 4823, '//static.miniclipcdn.com/content/game-icons/medium/NBIO_Icon_150x110.jpg', 620, 800, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;nobrakesio&quot; data-theme=&quot;0&quot; data-width=&quot;800&quot; data-height=&quot;620&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/nobrakesio/&quot;&gt;Play NoBrakes.io&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/nobrakesio/&quot; target=&quot;_blank&quot;&gt;Play NoBrakes.io&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Battle Golf Online', 4841, '//static.miniclipcdn.com/content/game-icons/medium/BGO_150x110_icon-min.jpg', 600, 960, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;battle-golf-online&quot; data-theme=&quot;0&quot; data-width=&quot;960&quot; data-height=&quot;600&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/battle-golf-online/&quot;&gt;Play Battle Golf Online&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/battle-golf-online/&quot; target=&quot;_blank&quot;&gt;Play Battle Golf Online&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt'),
('Shootermata', 4879, '//static.miniclipcdn.com/content/game-icons/medium/shootermata_150x110.jpg', 600, 800, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;shootermata&quot; data-theme=&quot;0&quot; data-width=&quot;800&quot; data-height=&quot;600&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/shootermata/&quot;&gt;Play Shootermata&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/shootermata/&quot; target=&quot;_blank&quot;&gt;Play Shootermata&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Bloxorz', 4890, '//static.miniclipcdn.com/content/game-icons/medium/Bloxorz_150x110_anim_3.gif', 768, 1024, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;bloxorz&quot; data-theme=&quot;0&quot; data-width=&quot;1024&quot; data-height=&quot;768&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/bloxorz/&quot;&gt;Play Bloxorz&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/bloxorz/&quot; target=&quot;_blank&quot;&gt;Play Bloxorz&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Sleigh Shot', 4904, '//static.miniclipcdn.com/content/game-icons/medium/SSN_150x110_icon.jpg', 768, 1024, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;sleigh-shot&quot; data-theme=&quot;0&quot; data-width=&quot;1024&quot; data-height=&quot;768&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/sleigh-shot/&quot;&gt;Play Sleigh Shot&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/sleigh-shot/&quot; target=&quot;_blank&quot;&gt;Play Sleigh Shot&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Big Shot Boxing', 4932, '//static.miniclipcdn.com/content/game-icons/medium/boxing_mini150x110.png', 350, 520, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;big-shot-boxing&quot; data-theme=&quot;0&quot; data-width=&quot;520&quot; data-height=&quot;350&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/big-shot-boxing/&quot;&gt;Play Big Shot Boxing&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/big-shot-boxing/&quot; target=&quot;_blank&quot;&gt;Play Big Shot Boxing&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;'),
('Slime Pizza', 4942, '//static.miniclipcdn.com/content/game-icons/medium/slimepizza_150x110.jpg', 640, 480, '&lt;div id=&quot;miniclip-game-embed&quot; data-game-name=&quot;slime-pizza&quot; data-theme=&quot;0&quot; data-width=&quot;480&quot; data-height=&quot;640&quot; data-language=&quot;en&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/slime-pizza/&quot;&gt;Play Slime Pizza&lt;/a&gt;&lt;/div&gt; &lt;p style=&quot;text-align:center;&quot;&gt;&lt;a href=&quot;http://www.miniclip.com/games/slime-pizza/&quot; target=&quot;_blank&quot;&gt;Play Slime Pizza&lt;/a&gt;&lt;/p&gt;&lt;script src=&quot;//static.miniclipcdn.com/js/game-embed.js&quot;&gt;&lt;/script&gt;');

-- --------------------------------------------------------

--
-- Struktura tabulky `games_category`
--

CREATE TABLE `games_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `library`
--

CREATE TABLE `library` (
  `id` int(10) UNSIGNED NOT NULL,
  `lib_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `format` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `db_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `location_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `library`
--

INSERT INTO `library` (`id`, `lib_name`, `ip`, `format`, `db_name`, `port`, `location_id`) VALUES
(2, 'MestskÃ¡ kniÅ¾nica mesta PieÅ¡Å¥any', 'arl1.library.sk', 'UNIMARC', 'pim_un_cat', 8887, 3),
(3, 'UniverzitnÃ¡ kniÅ¾nica Univerzity Mateja Bela v Banskej Bystrici', 'arl1.library.sk', 'UNIMARC', 'umb_un_cat', 8887, 4),
(4, 'KniÅ¾nica MestskÃ©ho centra kultÃºry Malacky', 'arl4.library.sk', 'UNIMARC', 'mal_un_cat', 8886, 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `location`
--

CREATE TABLE `location` (
  `id` int(10) UNSIGNED NOT NULL,
  `latitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `location`
--

INSERT INTO `location` (`id`, `latitude`, `longitude`) VALUES
(1, '48.164408', '17.151330'),
(2, '48.439781', '17.012979'),
(3, '48.588207', '17.824810'),
(4, '48.741130', '19.121453'),
(11, '49.123351', '18.318623');

-- --------------------------------------------------------

--
-- Struktura tabulky `type`
--

CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `library_id` int(10) UNSIGNED DEFAULT NULL,
  `video_id` int(10) UNSIGNED DEFAULT NULL,
  `book_cat_id` int(10) UNSIGNED DEFAULT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `channel_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `browser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `system` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `visit_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ytb_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `videos`
--

INSERT INTO `videos` (`id`, `ytb_id`, `category`) VALUES
(1, '5lzrB2Wfzvo', 1),
(2, '5_KQDxJ2uqg', 1),
(3, 'U3lhQew9XCs', 1),
(4, 'vp66plzjo_M', 3),
(5, 'plI5B9-Myd0', 3),
(6, '8CKF8v4suOY', 3),
(7, 'EtH9Yllzjcc', 3),
(8, 'N7hGESDZaW', 2),
(9, 'oEe9Xyq0N2E', 2),
(10, 'oEJWhdh6nkM', 2),
(11, 'rPtojZoUnvc', 4),
(12, 'MIveoUzsOuw', 4),
(13, '5xP_uljzXoQ', 4),
(14, 'c5VIvLh7yEg', 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `video_category`
--

CREATE TABLE `video_category` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `video_category`
--

INSERT INTO `video_category` (`id`, `name`, `image_path`) VALUES
(1, 'RozprÃ¡vky', 'img/vcat/fairytale.jpg'),
(2, 'UÄÃ­me sa jazyky', 'img/vcat/language-learning.jpg'),
(3, 'ZÃ¡bavnÃ©', 'img/vcat/zabavne.png'),
(4, 'VÄielka MÃ¡ja', 'img/vcat/maja.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `video_channels`
--

CREATE TABLE `video_channels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ytb_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_path` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `video_channels`
--

INSERT INTO `video_channels` (`id`, `name`, `ytb_id`, `video_title`, `banner_path`) VALUES
(1, 'Spievankovo', 'UCKo69ZqrTI1uz1Kx4V6WTYQ', 'SPIEVANKOVO', 'https://yt3.ggpht.com/RpvQ94iieJCqfqQmHJVFkoVAnF-P9eMbkwZMAsTMzI_vulHKB1xqqqt3pg_Ww0F7nWyozBU=w1060-fcrop64=1,00005a57ffffa5a8-nd-c0xffffffff-rj-k-no'),
(2, 'FIHA tralala', 'UC2QySOE0ohZFd-1XsXzNHPw', 'FÃHA tralala', 'https://yt3.ggpht.com/2DHfFcpf1sUKwTFlS5V-gkyHJ7Mxy_NnHspl7syybqwVntQPT77GZRHM8F2q7kNjhlN9rdNG6Q=w1060-fcrop64=1,00005a57ffffa5a8-nd-c0xffffffff-rj-k-no'),
(3, 'Smejko a Tanculienka', 'UCia0mF-pM9xo5ZMN8DoFp_Q', 'Smejko a Tanculienka', 'https://yt3.ggpht.com/JYW8t_A2XesOE5gt087WAIBV2J2F6bnVPAetG0L8_CbAptmbVsL3zZcx_eTwUucHSV-lEZQiPQ=w1060-fcrop64=1,00005a57ffffa5a8-nd-c0xffffffff-rj-k-no'),
(4, 'Tarajko a Popletajka', 'UCOBOXUNR5kfkjhGz7AYwrNQ', 'TÃ¡rajko a Popletajka', 'https://yt3.ggpht.com/4L6JLcHP8fwvx2MOzVjiUd0dOxdkocxmLen6ofFNpybDjdWcv4-VJQ44edk-iRSIFKh3HyBgO8Y=w1060-fcrop64=1,00005a57ffffa5a8-nd-c0xffffffff-rj-k-no'),
(5, 'Slovenske detske pesnicky', 'UCs3gfQX5MWjG6afWHTkb4Jw', 'SlovenskÃ© detskÃ© pesniÄky', 'https://yt3.ggpht.com/MZhyWPSHK1bLHV1RFHwUxNCVQwQ6pMS2Z6S59cQalEe7ZWlt4Jklx4nmFgo8_WFtlaEi4wKagAg=w1060-fcrop64=1,00005a57ffffa5a8-nd-c0xffffffff-rj-k-no'),
(6, 'Rozpravkovo', 'UCMTeQdws4fIAlW_VbSHUhKQ', 'RozprÃ¡vkovo', 'https://yt3.ggpht.com/i5cyR-7mjI40Guzvi9w0feoAuEF7kVJTbaO_uR_F0z3gm0gUEireHjXOWqjbfo7hkTS8Vxfj=w1060-fcrop64=1,00005a57ffffa5a8-nd-c0xffffffff-rj-k-no'),
(7, 'English Singsing', 'UCGwA4GjY4nGMIYvaJiA0EGA', 'English Singsing', 'https://yt3.ggpht.com/MRzXeazOBdXhPXYEuN7FBschbIN1SbzAA1B54VezCx4cgnZvRRoPI2EwsKAjjFRP4FPmDyXH=w1060-fcrop64=1,00005a57ffffa5a8-nd-c0xffffffff-rj-k-no');

-- --------------------------------------------------------

--
-- Struktura tabulky `visit`
--

CREATE TABLE `visit` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Klíče pro tabulku `book_cat`
--
ALTER TABLE `book_cat`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `book_filter`
--
ALTER TABLE `book_filter`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Klíče pro tabulku `games_category`
--
ALTER TABLE `games_category`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Klíče pro tabulku `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `library_id` (`library_id`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `book_cat_id` (`book_cat_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `channel_id` (`channel_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Klíče pro tabulku `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `video_category`
--
ALTER TABLE `video_category`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `video_channels`
--
ALTER TABLE `video_channels`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `book_cat`
--
ALTER TABLE `book_cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pro tabulku `book_filter`
--
ALTER TABLE `book_filter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `games_category`
--
ALTER TABLE `games_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `library`
--
ALTER TABLE `library`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pro tabulku `location`
--
ALTER TABLE `location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pro tabulku `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pro tabulku `video_category`
--
ALTER TABLE `video_category`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `video_channels`
--
ALTER TABLE `video_channels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `book_cat` (`id`);

--
-- Omezení pro tabulku `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Omezení pro tabulku `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`),
  ADD CONSTRAINT `type_ibfk_2` FOREIGN KEY (`library_id`) REFERENCES `library` (`id`),
  ADD CONSTRAINT `type_ibfk_3` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`),
  ADD CONSTRAINT `type_ibfk_4` FOREIGN KEY (`book_cat_id`) REFERENCES `book_cat` (`id`),
  ADD CONSTRAINT `type_ibfk_5` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `type_ibfk_6` FOREIGN KEY (`channel_id`) REFERENCES `video_channels` (`id`);

--
-- Omezení pro tabulku `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`id`);

--
-- Omezení pro tabulku `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
