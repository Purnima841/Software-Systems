#!/bin/bash

s/\t\t*/ /g
s/  */ /g
/^[ \t]*$/d
s/^[ \t]*//g
s/[\t ]*&//g
