import os
from django.conf import settings
from django.shortcuts import render, HttpResponse, redirect
import classify
import upload


def result(request):
    image = request.POST.get('image')
    target = classify.model.predict(image)
    upload(image, ID)
    return render(request, 'result.php'), {'target': target}

