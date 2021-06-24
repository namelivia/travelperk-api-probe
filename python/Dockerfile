FROM python:3.8-alpine
WORKDIR /app
COPY . /app
RUN apk update
RUN apk add gcc musl-dev git
RUN pip install pipenv
RUN pipenv install --dev
EXPOSE 4444
