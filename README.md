phpPrep
=======
php.ini 
display_errors=On
[XDebug] -  uncomment
xdebug.remote_enable = 1


<?= "output".$var ?>   <=>  <?php echo ""output".$var ?> 
=& - pointer

global $var - use $var, which is out of this function;

preg_match_all semantic examp
*****
echo 'var_dump($out)'."\n";
PREG_SPLIT_NO_EMPTY

.	any char
*	Matches the preceding element zero or more times
<.*?	matches ONLY the first <and some symbols after
\b	Matches a zero-width boundary between a word-class
		character (see next) and either a non-word class character or an edge.
\s	Matches a whitespace character,
	which in ASCII are tab, line feed, form feed, carriage return, and space;
	in Unicode, also matches no-break spaces, next line, and the variable-width spaces (amongst others).
