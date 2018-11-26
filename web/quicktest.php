<?php

/**
 * Source function code
 *
 * function (A, B, C, D, E)
 * {
 *
 * if (A) {
 *
 * k();
 * if (B) {
 *
 * m();
 * if (C) {
 *
 * n();
 * if (D) {
 *
 * p();
 * if (E) {
 *
 * q();
 *
 * return true;
 * } else {
 *
 * r();
 *
 * return false;
 * }
 * } else {
 *
 * s();
 *
 * return false;
 * }
 * } else {
 *
 * t();
 *
 * return false;
 * }
 * } else {
 *
 * v();
 *
 * return false;
 * }
 * } else {
 *
 * w();
 *
 * return false;
 * }
 * }
 *
 *
 *
 * The source function code seems to make check that all options (A-E) are TRUE.
 * If it all true this function returns TRUE.
 * If any given option is FALSE, then this function returns FALSE.
 * It is something like logical AND function, which could be executed by the one IF ELSE statement,
 * but there are some functions that have to be executed for each of the option if it is TRUE or FALSE like EVENTS
 *
 * To make it more readable, reusable and simple i made an array from starting options like A,B,C,D,E ( index 0 )and associated success ( index 1 ) and fail ( index 2 ) named functions(events),
 * which could probably print some information as in example below. The sequence of such an array is sensitive and it reflects the order of testing
 *
 * So, first, to make a workable example i declared that named functions
 * Secondly, i made a foreach loop on an options array to test each element's value. Then call success or fail function using IF ELSE statement.
 * Test Function returns true if all options where positive, and returns FALSE after first negative value happened and called associated fail function.
 *
 * If it is required to exclude/include some test, we have to exclude that element from or add additional element to the options array with it's success and fail functions.
 * The key 'val' is required
 * Keys 'success' and 'fail' are optional. There is no call to non-existent functions.
 * That's all.
 *
 * Here are some examples to test this code with:
 **/

/*
 * examples begin
 */

/*
 * example 1
 */
#$A = $B = $C = $D = $E = 1;

/*
 * example 2
 */
#$A=$B=$C=$D=$E=0;

/*
 * example 3
 */
#$A=$B=$C=$D=$E=true;

/*
 * example 4
 */
#$A=$B=$C=$D=$E=false;

/*
 * example 5
 */
$A = $B = $C = true;
$D = $E = false;

/*
 * example 6
 */
#$A=true;
#$B=false;
#$C=false;
#$D=true;
#$E=false;
/*
 * examples end
 */

function test($options)
{
    foreach ($options as $el) {
        if ($el[0]) {
            if (array_key_exists(1, $el) && function_exists($el[1])) {
                $el[1](); /* call success function */
            }
        } else {
            if (array_key_exists(2, $el) && function_exists($el[2])) {
                $el[2](); /* call fail function */
            }

            return false;
        }
    }

    return true;
}

function k()
{
    echo 'k';
}

function m()
{
    echo 'm';
}

function n()
{
    echo 'n';
}

function p()
{
    echo 'p';
}

function q()
{
    echo 'q';
}

function r()
{
    echo 'r';
}

function s()
{
    echo 's';
}

function t()
{
    echo 't';
}

function v()
{
    echo 'v';
}

function w()
{
    echo 'w';
}

/* register options [ test value, success function, fail function ] */
$options = [
    [$A, 'k', 'w'],
    [$B, 'm', 'v'],
    [$C, 'n', 't'],
    [$D, 'p', 's'],
    [$E, 'q', 'r'],
];

/* Make tests and dump function result */
var_dump(test($options));