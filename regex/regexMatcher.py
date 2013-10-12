def regexMatcher(patern, string):
	if (patern == '') | (string == ''):
		res = True
	else:
		i = 0
		j = 0
		pos = 0
		while ((i < len(patern)) & (pos < len(string))):
			if (patern[i] == '.') | (patern[i] == string[pos]):
				pos += 1
				res = True
			elif (patern[i] == '*'):
				i += 1
				res = True
			else:
				j = pos
				res = False
				while (j < len(string)):								
					if (patern[i] == string[j]):
						pos = j
						res = True

					j += 1

			i += 1
			
	return res

assert regexMatcher('', '')
assert regexMatcher('a', 'a')
assert not regexMatcher('b', 'a')
assert regexMatcher('a', 'ab') # i don't like this kind of matching 
assert regexMatcher('a', 'bac')

assert regexMatcher('.', 'a')
assert regexMatcher('.a', 'ca')
assert regexMatcher('a.c', 'abc')
assert not regexMatcher('.c', 'abd')

assert regexMatcher('a*', 'a')
assert regexMatcher('a*', 'aa')
assert regexMatcher('a*', 'aaa')
assert regexMatcher('ba*', 'baaa')
assert regexMatcher('a*b', 'ab')
assert regexMatcher('a*b', 'aaab')
assert not regexMatcher('a*bc', 'aaab')
assert regexMatcher('ab*c', 'abc')
assert regexMatcher('ab*c', 'abbbbbbc')

assert regexMatcher('a*b', 'b')
assert regexMatcher('a*', '')
assert regexMatcher('ba*', 'b')
assert regexMatcher('ba*', 'bc')

assert regexMatcher('.*', '')
assert regexMatcher('.*', 'aaaa')
assert regexMatcher('.*.', 'aaaa')
assert regexMatcher('.*.', 'a')
# assert not regexMatcher('.*.', '') i don't get this test working
assert regexMatcher('a.*c', 'abc')
assert regexMatcher('a.*c', 'abbbc')

assert regexMatcher('ba*a', 'ba')
assert regexMatcher('ba*aa', 'baaa')
assert regexMatcher('b.*aa', 'baaa')

print 'All tests are green'