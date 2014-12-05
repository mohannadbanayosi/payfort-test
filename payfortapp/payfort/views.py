from django.shortcuts import render, render_to_response
from django.http import HttpResponse
import os

import subprocess


def home(request):
	# print ("Payment Successful? i dont know, I really dont know.")
	# return HttpResponse("Payment Successful? i dont know, I really dont know.")
	return render_to_response('home.html')

def buy_ipad(request):
	print "Sending payment request"
	BASE_DIR = os.path.dirname(os.path.dirname(__file__))
	path = BASE_DIR + "/payfort/PAYatSTORE.php"
	script = "php " + path
	subprocess.call(script, shell=True)
	print "Payment request sent successfully."
	return HttpResponse("Payment request sent successfully. Contact the merchant to proccess your payment")