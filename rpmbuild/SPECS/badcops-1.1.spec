%define srcdir ~/BadCops/html
%define applidir /opt/application/bad/php/current/public
%define confddir /opt/application/bad/apache2215/current/conf.d

Name:		badcops
Version:	1.2
Release:	0
Summary:	A minimalist app for an automatic cloud deployement

Group:		Applications/System
License:	MIT
#URL:		
#Source: 	%{name}-%{version}-%{release}
BuildArch:	noarch
#BuildRoot              %{_buildrootdir}/%{name}-%{version}-%{release}.%{_arch}
#BuildRequires:	
Requires:	httpd >= 2.2, php54

%description
With this application, let's go for Cloud !


%prep
echo "[%{name}] Preparing $(pwd)"
# Copy php files
mkdir -p .%{applidir} 
cp -a %{srcdir}/badcops/* .%{applidir} 
# Copy vhost.conf file
mkdir -p .%{confddir} 
cp -a %{srcdir}/vhost-bad.conf .%{confddir} 
#signature
echo %{name}-%{version}-%{release}.%{_arch} > .%{applidir}/signature


%build
echo "[%{name}] Building in $(pwd)"


%install
echo "[%{name}] Installing to $RPM_BUILD_ROOT"
rm -rf $RPM_BUILD_ROOT/*
cp -af . "$RPM_BUILD_ROOT"


%clean
rm -rf $RPM_BUILD_DIR/*
rm -rf $RPM_BUILD_ROOT

%files
#%defattr(-,root,root,-)
#%doc
%defattr(660,bad,bad)
%{applidir}/*
%{confddir}/vhost-bad.conf

%changelog
# add date with date +"%a %b %d %Y" format
* Tue May 20 2015 Gwenael Lord <glord.ext@orange.com> - 1.0-0
- ver 1.0 first build
- ver 1.2 vhost.conf included
