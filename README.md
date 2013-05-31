Tree-of-life
================
The project Tree of Life

Social media system, links people suffering from cancer with those, who could help them in a quicker, better, and more humane way than the present institutionalized healthcare system does. Mass support system. 

It will enable fast access to information, which is a key factor in the healing process. It will also allow people who do not have any personal connections to cancer, to offer their skills, knowledge, experience, and time to be used in helping patients.

The system should contribute to cancer patients living longer, better, and with the feeling of social support.

Ultimately, the Tree of Life will constitute an element of the website of the Alivia Foundation - www.alivia.org.pl. It will be used by both patients and healthy people, those who seek help and support, and those who can offer it in different forms.

@ http://www.rhok.org/node/19959

Team
==================
Fundation Alivia.org
- Agata Polińska
- Bartosz Poliński

Hackers:

- Konrad Podgórski,
- Jacek Lange,
- Jacek Głodek,


Polish description
=================


Rysowanie drzewa - Jacek Głodek

- drzewo rysuje się
- drzewo generuje liście z tablic user_needs, user_helps
- gałęzie robią się za cienkie i nie widać wszystkich liści
- są dwie początkowe gałęzie jedna dla potrzeb chorych, jedna dla ofert pomocy
- Niektóre gałęzie nie kończą się rysować


Co trzeba zrobić:
- Zczytać dane z JSON'a z adresu /needs.json /helps.json
- Poprawić
- rozdzielić skrypty, style i htmla od siebię.


## Panel zarządzania (backend), struktura strony Konrad Podgórski, Jacek Lange:
- brakuje w tym momencie zabezpieczenia backendu, na czas pracy jest to wygodniejsze

### frontend co mamy
/login 
/register
/need
/help

### backend
/need
/help
/category
