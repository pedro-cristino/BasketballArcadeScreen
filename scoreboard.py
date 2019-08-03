import RPi.GPIO as GPIO
import time
import os

GPIO.setmode(GPIO.BOARD)
GPIO.setup(3,GPIO.OUT, initial = GPIO.LOW)
GPIO.setup(5,GPIO.IN)
count = 0
incremented = False
while True:
	GPIO.output(3, GPIO.input(5))
	if GPIO.input(5) == 0 and incremented == False :
		count = count + 1
		incremented = True
		f = open("test.data","w")
		f.write(str(count) + ";" + str(os.getpid()))
		f.close()
	if GPIO.input(5) == 1:
		incremented = False
#	print(GPIO.input(5))
	time.sleep(0.05)
