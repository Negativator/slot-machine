PHP simple slot machine;

Main class -> Game\Slot\SlotMachine.
The class consists of 1 public method spin that requires a float number "$stake";

The public method returns an array in the format 

```
    [
        'board' => board before mystery symbols replaced
        'replacedTiles' => coordinates of mystery tiles replaced by normal ones format [row => col],
        'winLines' => [
            'tileId' => nested array containing win symbol ('tileId'),
            'coordinates' => coords of the line [col => row],
            'total' => consequtive symbols count,
            'pattern' => whole win line (based on config)
        ],
        'payout' => total win amount
   ]
```

Game can be played from command line using ```php {PATH_TO_PROJECT} index.php``` 