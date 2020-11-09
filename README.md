# Find the shortest distance between two cities

Using Dijkstra's algorithm, and using a matrix with the "cost" for the connections and the cities, it can calculate what is the shortest distance between those two cities

### Usage

```
php shortest_dist.php
```
</br>
Input variables can be read from the input.php file

### Example of input.php

```php
$init='Logroño';
$end='Ciudad Real';
$cities = ['Logroño','Zaragoza','Teruel','Madrid','Lleida','Alicante','Castellón','Segovia','Ciudad Real'];
$connections = array([0,4,6,8,0,0,0,0,0], 
        [4,0,2,0,2,0,0,0,0],
        [6,2,0,3,5,7,0,0,0],
        [8,0,3,0,0,0,0,0,0],
        [0,2,5,0,0,0,4,8,0],
        [0,0,7,0,0,0,3,0,7],
        [0,0,0,0,4,3,0,0,6],
        [0,0,0,0,8,0,0,0,4],
        [0,0,0,0,0,7,6,4,0]);
```
