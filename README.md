oxforddatesofterm
=================

Oxford Dates of Term (Michaelmas, Hilary, Trinity)

A small function that will pass a date ('YYYY-mm-dd') and providing that date falls within an Oxford term, it will return the start date, end date and term name.

Usage
-----
In PHP just call:

```
$var = ox_term_date("2014-04-28")
```

and $var will contain:

```
array(
	"term_name" = "Trinity",
	"week_num" = "1",
	"week_name" = "1st",
	"term_start" = "2014-04-27",
	"term_end" = "2014-06-21"
)
```

Date Information
----------------

Dates taken from http://www.ox.ac.uk/about_the_university/university_year/dates_of_term.html

Author
------
Made by Andrew Breakspear @ St Edmund Hall
Feel free to use this in anyway you want - but I'd love to hear about it!