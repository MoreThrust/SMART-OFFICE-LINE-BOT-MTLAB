#-*- coding: utf-8 -*-
import cv2
import cv2.cv as cv
import numpy as np
import os
import sys, time
import urllib
import requests

def get_images(path, size):
    sub= 0
    images, labels= [], []
    people= []

    for subdir in os.listdir(path):
        for image in os.listdir(path+ "/"+ subdir):
            #print(subdir, images)
            img= cv2.imread(path+os.path.sep+subdir+os.path.sep+image, cv2.IMREAD_GRAYSCALE)
            img= cv2.resize(img, size)
            images.append(np.asarray(img, dtype= np.uint8))
            labels.append(sub)

        people.append(subdir)
        sub+= 1

    return [images, labels, people]

def detect_faces(image):
    frontal_face= cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
    bBoxes= frontal_face.detectMultiScale(image, scaleFactor=1.3, minNeighbors=4, minSize=(30, 30), flags = cv.CV_HAAR_SCALE_IMAGE)

    return bBoxes

def train_model(path):
    [images, labels, people]= get_images(sys.argv[1], (256, 256))
    labels= np.asarray(labels, dtype= np.int32)
    print("Initializing eigen FaceRecognizer and training...")
    sttime= time.clock()
    eigen_model= cv2.createEigenFaceRecognizer()
    eigen_model.train(images, labels)
    print("\tSuccessfully completed training in "+ str(time.clock()- sttime)+ " Secs!")

    return [eigen_model, people]

def majority(mylist):
    myset= set(mylist)
    ans= mylist[0]
    ans_f= mylist.count(ans)

    for i in myset:
        if mylist.count(i)> ans_f:
            ans= i
            ans_f= mylist.count(i)

    return ans

def line_notify():
    url = "https://notify-api.line.me/api/notify"

    payload = "message=%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%AB%E0%B8%B2%E0%B8%A3"
    headers = {
    'Content-Type': "application/x-www-form-urlencoded",
    'Authorization': "Bearer wuyMUMwZg9LbLNXT1W0nqWudXyBrGIiu3QXpaTksSvS",
    'Cache-Control': "no-cache",
    'Postman-Token': "2892909d-9ffc-406d-8d08-fe5596bd0ca5"
    }

response = requests.request("POST", url, data=payload, headers=headers)

if __name__== "__main__":
    if len(sys.argv)!= 2:
        print("Wrong number of arguments! See the usage.\n")
        print("Usage: face_detrec_video.py <full/path/to/root/images/folder>")
        sys.exit()

    arg_one= sys.argv[1]
    eigen_model, people= train_model(arg_one)

    #starts recording video from camera and detects & predict subjects
    cap = cv2.VideoCapture(0)
    cap.set(cv.CV_CAP_PROP_FRAME_WIDTH, 360)
    cap.set(cv.CV_CAP_PROP_FRAME_HEIGHT, 240)
    counter= 0
    last_20= [0 for i in range(90)]
    final_5= []
    box_text= "Name: "

    while(True):
        ret, frame= cap.read()
        gray_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
        gray_frame = cv2.equalizeHist(gray_frame)

        bBoxes= detect_faces(gray_frame)

        for bBox in bBoxes:
            (p,q,r,s)= bBox
            cv2.rectangle(frame, (p,q), (p+r,q+s), (225,0,25), 2)

            crop_gray_frame= gray_frame[q:q+s, p:p+r]
            crop_gray_frame= cv2.resize(crop_gray_frame, (256, 256))

            [predicted_label, predicted_conf]= eigen_model.predict(np.asarray(crop_gray_frame))
            last_20.append(predicted_label)
            last_20= last_20[1:]

            cv2.putText(frame, box_text, (p-20, q-5), cv2.FONT_HERSHEY_PLAIN, 1.3, (25,0,225), 2)

            if counter%10== 0:
                max_label= majority(last_20)
                box_text= format("Name: "+ people[predicted_label])
                if counter > 10:
					if people[predicted_label] == "koo":
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Door/1"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Face/พีรภัทร"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Permission/ผ่านได้"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Status_door/ปลดล็อค"
						response = urllib.urlopen(url).read()
                        line_notify()
						#print response
						print("Face is Koo")
					if people[predicted_label] == "ice":
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Door/1"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Face/ICE"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Permission/ผ่านได้"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Status_door/ปลดล็อค"
						response = urllib.urlopen(url).read()
						#print response
						print("Face is Ice")
					if people[predicted_label] == "pop":
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Door/1"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Face/POP"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Permission/ผ่านได้"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Status_door/ปลดล็อค"
						response = urllib.urlopen(url).read()
						#print response
						print("Face is Pop")
					if people[predicted_label] == "not":
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Door/0"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Face/ไม่มีในระบบ"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Permission/ห้ามผ่าน"
						response = urllib.urlopen(url).read()
						url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Status_door/ล็อคอยู่"
						response = urllib.urlopen(url).read()
						#print response
						print("Face is not")
					#url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Door/0"
					#response = urllib.urlopen(url).read()
					#url = "https://api.anto.io/channel/set/Qe6ik60N8A6tsvGLKgEh1FnrPHK7gLqxlVUtNRCC/FaceRecognition/Status_door/ล็อคอยู่"
					#response = urllib.urlopen(url).read()
					
        cv2.imshow("Video Window", frame)
        counter+= 1

        if (cv2.waitKey(5) & 0xFF== 27):
            break

    cv2.destroyAllWindows()

curl -X POST -H 'Authorization: Bearer wuyMUMwZg9LbLNXT1W0nqWudXyBrGIiu3QXpaTksSvS' -F 'message=Your message 55' \https://notify-api.line.me/api/notify