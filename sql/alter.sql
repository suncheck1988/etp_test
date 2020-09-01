CREATE TABLE public.web_statistic (
    id integer NOT NULL,
    ip integer NOT NULL,
    url_from text NOT NULL,
    url_to text NOT NULL,
    browser character varying(25),
    os character varying(25),
    date integer NOT NULL
);

CREATE UNIQUE INDEX "ip-url_from-url_to-date" ON public.web_statistic USING btree (ip, url_from, url_to, date);
CREATE UNIQUE INDEX "ip-date" ON public.web_statistic USING btree (ip, date);