package main

import (
	"io/ioutil"
	"net/http"

	"github.com/labstack/echo"
	"github.com/labstack/echo/middleware"
)

func main() {
	// TODO: Check Session and get JWT
	e := echo.New()
	e.Use(middleware.CORS())
	e.GET("/", func(c echo.Context) error {
		return c.String(http.StatusOK, "Hello world\n")
	})

	e.GET("/token", func(c echo.Context) error {
		resp, err := http.Get("http://app:8080/index/sample")
		if err != nil {
			return c.String(http.StatusNotFound, "Not Found")
		}

		defer resp.Body.Close()
		body, err := ioutil.ReadAll(resp.Body)
		return c.String(http.StatusOK, string(body))
	})

	e.Logger.Fatal(e.Start(":3000"))
}
