FROM golang:1.8

ENV GOPATH /go
ENV PATH $GOPATH/bin:$PATH

RUN go get github.com/dgrijalva/jwt-go
RUN go get github.com/labstack/echo
RUN go get github.com/labstack/echo/middleware