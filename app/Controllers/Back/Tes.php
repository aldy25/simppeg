<?php
function is_prime($num)
{
	if ($num <= 1) {
		return false;
	}
	if ($num <= 3) {
		return true;
	}
	if ($num % 2 == 0 || $num % 3 == 0) {
		return false;
	}
	$i = 5;
	while ($i * $i <= $num) {
		if ($num % $i == 0 || $num % ($i + 2) == 0) {
			return false;
		}
		$i += 6;
	}
	return true;
}

function print_primes_smaller_than($n)
{
	for ($i = 2; $i < $n; $i++) {
		if (is_prime($i)) {
			echo $i . ' ';
		}
	}
}

// Get input from the user
$limit = readline("Enter a number: ");
echo "Prime numbers smaller than $limit are: ";
print_primes_smaller_than($limit);
