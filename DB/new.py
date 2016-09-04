def f(st):
	i=0
	while i<len(st) and st[i]!='\'':
		i+=1;
	j=len(st)-1
	while j>=0 and st[j]!='\'':
		j-=1
	return st[i+1:j]
		


while 1:
	try:
		a= raw_input()
		j=0
		while a[j]!='(':
			j+=1
		l=len(a)-2
		g=a[j+1:l].split('\',\'')
	except EOFError:
		break