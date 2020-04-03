#!/usr/bin/env python
# coding: utf-8


class BigNumbers(object):

    def __init__(self, first_num, second_num):
        self.len = int(max(len(first_num), len(second_num)))
        if self.len > len(first_num):
            self.first_num = first_num.zfill(self.len)
            self.second_num = second_num
        else:
            self.first_num = first_num
            self.second_num = second_num.zfill(self.len)

    def sum(self):
        result = ''
        transmission = 0

        for i in range(self.len - 1, -1, -1):
            sum = int(self.first_num[i]) + int(self.second_num[i]) + transmission
            transmission = sum // 10
            if i > 0:
                result = '{}{}'.format(sum % 10, result)
            else:
                return '{}{}'.format(sum, result)


firstnum = input('Enter first number:  ')
secondnum = input('Enter second number: ')

big_numbers = BigNumbers(firstnum, secondnum)
print('Sum: {}'.format(big_numbers.sum()))
