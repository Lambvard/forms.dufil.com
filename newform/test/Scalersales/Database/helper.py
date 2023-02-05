import serial
mathematician =serial.Serial("COM20", 9600)
disp=mathematician.readline()
print (disp)
