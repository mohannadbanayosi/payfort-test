from django.shortcuts import render, render_to_response
from django.http import HttpResponse

# Create your views here.
def home(request):
	print ("Payment Successful? i dont know, I really dont know.")
	# return HttpResponse("Payment Successful? i dont know, I really dont know.")
	return render_to_response('home.html')