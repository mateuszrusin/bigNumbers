#!/usr/bin/env python
# coding: utf-8
import sys


class BigNumbers(object):

    def sum(self, x, y):
        result = ''
        transmission = 0

        x, y, _ = self.order(x, y)

        for i in range(len(x) - 1, -1, -1):
            sum = int(x[i]) + int(y[i]) + transmission
            if i > 0:
                transmission = sum // 10
                result = '{}{}'.format(sum % 10, result)

        return '{}{}'.format(sum, result).lstrip('0')

    def diff(self, x, y):
        result = ''
        transmission = 0

        x, y, sign = self.order(x, y)

        for i in range(len(x) - 1, -1, -1):
            diff = int(x[i]) - int(y[i]) - transmission
            if i > 0:
                transmission = int(diff < 0)
                result = '{}{}'.format(diff + transmission * 10, result)

        return sign + '{}{}'.format(diff, result).lstrip('0')

    def multi(self, x, y):
        result = ''

        x, y, _ = self.order(x, y)
        length = len(x) - 1

        for i in range(length, -1, -1):
            product = ''
            transmission = 0
            for j in range(length, -1, -1):
                multi = int(x[i]) * int(y[j]) + transmission
                if j > 0:
                    transmission = multi // 10
                    product = '{}{}'.format(multi % 10, product)
                else:
                    product = '{}{}'.format(multi, product)
            result = self.sum(result, self.pad_right(product, len(product) + length - i))

        return result

    def factorial(self, n):
        if int(n) < 2:
            return '1'

        p = self.diff(n, '1')
        m = self.factorial(p)

        return self.multi(m, n)

    def order(self, x, y):
        lenx = len(x)
        leny = len(y)

        if lenx < leny:
            return self.pad_left(y, leny), self.pad_left(x, leny), '-'
        elif lenx == leny:
            for i in range(lenx):
                if x[i] < y[i]:
                    return self.pad_left(y, leny), self.pad_left(x, lenx), '-'

        return self.pad_left(x, lenx), self.pad_left(y, lenx), ''

    @staticmethod
    def pad_left(string, length):
        return string.zfill(length)

    @staticmethod
    def pad_right(string, length):
        return string.ljust(length, '0')


sys.setrecursionlimit(10000)

firstnum = input('Enter first number:  ')
secondnum = input('Enter second number: ')

big_numbers = BigNumbers()

print('Sum: {}'.format(big_numbers.sum(firstnum, secondnum)))
print('Diff: {}'.format(big_numbers.diff(firstnum, secondnum)))
print('Multi: {}'.format(big_numbers.multi(firstnum, secondnum)))
print('Factorial {}: {}'.format(firstnum, big_numbers.factorial(firstnum)))
print('Factorial {}: {}'.format(secondnum, big_numbers.factorial(secondnum)))
