<?php

namespace Php\Package\Tests;

use PHPUnit\Framework\TestCase;

use function Php\Package\Utils\reverseString;

// Класс UtilsTest наследует класс TestCase
// Имя класса совпадает с именем файла
class UtilsTest extends TestCase
{
    // Метод (функция), определенный внутри класса,
    // Должен начинаться со слова test
    // Ключевое слово public нужно, чтобы PHPUnit мог вызвать этот тест снаружи
    public function testReverse(): void
    {
        // Сначала идет ожидаемое значение (expected)
        // И только потом актуальное (actual)
        $this->assertEquals('', reverseString(''));
        $this->assertEquals('olleh', reverseString('hello'));

        $input = $this->getFixtureContent('input.txt');
        $expectedOutput = $this->getFixtureContent('output.txt');
        $this->assertEquals($expectedOutput, reverseString($input));
    }

    private function getFixtureContent(string $fixtureName): string
    {
        $path = __DIR__ . '/fixtures/' . $fixtureName;
        $content = file_get_contents($path);
        if ($content === false) {
            throw new \RuntimeException("Не удалось прочитать файл: {$path}");
        }
        return trim($content);
    }
}
