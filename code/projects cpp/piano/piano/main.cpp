#include <SFML/Graphics.hpp>
#include <SFML/Graphics/Text.hpp>
#include <SFML/Graphics/Transformable.hpp>
#include <iostream>

int main(void)
{
    sf::RenderWindow window(sf::VideoMode(600, 400), "Awesome");
    sf::CircleShape shape(1024);
    shape.setFillColor(sf::Color::Green);

    sf::Font font;

    if(!font.loadFromFile("arial.ttf"))
        return -1;

    sf::Text text;

    text.setFont(font);

    text.setString("Witaj tutaj ja!");
    text.setCharacterSize(24);

    text.setColor(sf::Color::Red);
    text.setStyle(sf::Text::Bold | sf::Text::Underlined);


    text.setPosition(20, 20);

    while (window.isOpen())
    {
        sf::Event event;
        while (window.pollEvent(event))
        {
            if (event.type == sf::Event::Closed)
                window.close();
            if (sf::Mouse::isButtonPressed(sf::Mouse::Right))
                text.move(-5,0);

            if (sf::Mouse::isButtonPressed(sf::Mouse::Left))
                text.move(5,0);

            if (event.type == sf::Event::MouseWheelScrolled)
                text.move(0,5);

            if (event.key.code == sf::Keyboard::Escape)
                window.close();

            std::cout << sf::Text::getString;
        }

        window.clear();
        window.draw(shape);
        window.draw(text);

        window.display();
    }

}
