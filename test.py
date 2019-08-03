import RPi.GPIO as GPIO
import time
import os

GPIO.setmode(GPIO.BOARD)
GPIO.setup(3,GPIO.OUT, initial = GPIO.LOW)
GPIO.setup(5,GPIO.IN)
count = 0
incremented = False

print("salut")

