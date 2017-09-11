def get_user_input():
	x=input("Enter a number: ")
	x=int(x)
	return x

def try_except():
	try:
		x=get_user_input()
		print (x)
	except ValueError:
		print("you need to enter a number")
	except KeyboardInterrupt:
		print("you cancelled the application")
	except:
                print("error")
try_except()
