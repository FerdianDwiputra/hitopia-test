# hitopia-test

#use this project on laravel playground
https://laravelplayground.com/#/

#and add gist in it
https://gist.github.com/FerdianDwiputra/7944f557de102195b670ffce03f5350e

## Balanced Brackets Function - Complexity Analysis

### Time Complexity
The time complexity of the Balanced Brackets function is **O(n)**, where `n` is the length of the input string. This is because the function iterates through each character in the string exactly once, performing constant-time operations (`push` and `pop`) for each character.

### Space Complexity
The space complexity of the function is **O(n)**. In the worst-case scenario, all characters in the string are opening brackets, requiring the stack to hold all `n` characters.

### Details
- The function uses a single loop, ensuring linear time complexity.
- The stack is used to store unmatched opening brackets, which might require space proportional to the size of the input.
