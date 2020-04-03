#!/usr/bin/env python
# coding: utf-8


class BigNumbers(object):

    def __init__(self, first_num, second_num):
        self.len = int(max(len(first_num), len(second_num)))
        self.numbers = (first_num.zfill(self.len), second_num.zfill(self.len))

    def sum(self):
        result = ''
        transmission = 0

        for i in range(self.len - 1, -1, -1):
            sum = int(self.numbers[0][i]) + int(self.numbers[1][i]) + transmission
            transmission = sum // 10
            if i > 0:
                result = '{}{}'.format(sum % 10, result)
            else:
                return '{}{}'.format(sum, result)


firstnum = input('Enter first number:  ')
secondnum = input('Enter second number: ')

big_numbers = BigNumbers(firstnum, secondnum)
print('Sum: {}'.format(big_numbers.sum()))
